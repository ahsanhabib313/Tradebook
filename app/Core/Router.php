<?php
namespace App\Core;

use App\Core\Exception\ForbiddenException;
use App\Core\Exception\NotFoundException;

/**
* 
* Class Router
* @author Guru Arif <guruarifahmed@gmail.com>
* @package App\Core
*/

class Router
{
    public Request $request;
    public Response $response;
	protected array $routes = [];

    /**
     * Router constructor.
     * @param Request $request
     * @param Response $request
     */
    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }


    public function get($path, $callback)
	{
		$this->routes['get'][$path] = $callback;
	}

    public function post($path, $callback)
    {
        $this->routes['post'][$path] = $callback;
    }

    public function any($path, $callback)
    {
        if($this->request->isPost()){
            $this->routes['post'][$path] = $callback;
        }else{
            $this->routes['get'][$path] = $callback;
        }
    }

	public function resolve()
	{

		$path = $this->request->getPath();
        $method = $this->request->method();
        $callback = $this->routes[$method][$path] ?? false;

        if ($callback === false){
            $this->response->setStatusCode(404);
            throw new NotFoundException();
        }
        if (is_string($callback)){
            return Application::$app->view->render($callback);
        }
        if (is_array($callback)){
            /** @var  \App\Core\Controller $controller */
            $controller = new $callback[0](Application::$app->container);

            Application::$app->controller = $controller;
            $controller->action = $callback[1];
            $callback[0] = $controller;

            foreach ($controller->getMiddlewares() as $middleware){
                $middleware->execute();
            }
        }
        return call_user_func($callback, $this->request, $this->response);
	}
}

<?php
namespace App\Core;
use App\Core\BaseMiddleware;

/**
 *
 * Class Controller
 * @author Guru Arif <guruarifahmed@gmail.com>
 * @package App\Core;
 */

class Controller
{

    public string $action = '';

    public function app()
    {
        return Application::$app;
    }

    public function session()
    {
        return Application::$app->session;
    }

    public function response()
    {
        return Application::$app->response;
    }

    /**
     * @var \App\Core\Middlewares\BaseMiddleware[]
     */
    protected array $middlewares = [];

    public function render($view, $params = [])
    {
        return Application::$app->view->render($view, $params);
    }

    public function registerMiddleware(BaseMiddleware $middleware)
    {
        $this->middlewares[] = $middleware;
    }

    /**
     * @return Middlewares\BaseMiddleware[]
     */
    public function getMiddlewares(): array
    {
        return $this->middlewares;
    }
}
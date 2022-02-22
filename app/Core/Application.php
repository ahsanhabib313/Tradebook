<?php

namespace App\Core;



/**
 * 
 * Class Application
 * @author Guru Arif <guruarifahmed@gmail.com>
 * @package App\Core;
 */

class Application
{

    public static string $ROOT_PATH;

    public string $page404 = '';
    public Router $router;
    public Request $request;
    public Response $response;
    public Session $session;
    public Database $db;
    public View $view;
    public static $config;

    public static Application $app;
    public ?Controller $controller = null;

    public array $container = [];

    public function __construct($config)
    {
        self::$config = $config;
        self::$ROOT_PATH = isset(self::$config['settings']['rootPath']) ? self::$config['settings']['rootPath'] : '';
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->session = new Session();
        $this->router = new Router($this->request, $this->response);
        $this->view = new View();
    }


    public function run()
    {
        try {
            echo $this->router->resolve();
        } catch (\Exception $e) {

            if ($e->getCode() == 404 && $this->page404 != "") {
                $this->response->setStatusCode($e->getCode());

                echo $this->view->render($this->page404, [
                    'exception' => $e,
                ]);
                return;
            }

            $this->notFoundHandler($e);
        }
    }

    public static function getConfig($key = null, $config = 'settings')
    {
        if ($key) {
            return isset(self::$config[$config][$key]) ? self::$config[$config][$key] : false;
        }

        return self::$config;
    }


    public static function notFoundHandler($exception)
    {
        echo "<h3>Caught Exception!</h3>";
        echo "<p>Error message: " . $exception->getMessage() . "</p>";
        echo "<p>File: " . $exception->getFile() . "</p>";
        echo "<p>Line: " . $exception->getLine() . "</p>";
        echo "<p>Error code: " . $exception->getCode() . "</p>";
        echo "<p>Trace: " . $exception->getTraceAsString() . "</p>";
    }


    /**
     * @return Controller
     */
    public function getController(): Controller
    {
        return $this->controller;
    }

    /**
     * @param Controller $controller
     */
    public function setController(Controller $controller): void
    {
        $this->controller = $controller;
    }
}

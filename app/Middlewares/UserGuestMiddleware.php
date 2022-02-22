<?php

namespace App\Middlewares;

use App\Core\Application;
use App\Core\BaseMiddleware;

/**
 *
 * Class UserGuestMiddleware
 * @author Guru Arif <guruarifahmed@gmail.com>
 * @package App\Core\Middlewares;
 */

class UserGuestMiddleware extends BaseMiddleware
{
    public array $actions = [];

    /**
     * UserGuestMiddleware constructor.
     * @param array $actions
     */
    public function __construct($actions = [])
    {
        $this->actions = $actions;
    }


    public function execute()
    {
        if (Application::$app->session->get('user')) {
            if (empty($this->actions) || in_array(Application::$app->controller->action, $this->actions)) {
                Application::$app->response->redirect('/user/news_feed');
            }
        }
    }

}
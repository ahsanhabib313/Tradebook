<?php

namespace App\Middlewares;

use App\Core\Application;
use App\Core\BaseMiddleware;

/**
 *
 * Class AdminGuestMiddleware
 * @author Guru Arif <guruarifahmed@gmail.com>
 * @package App\Core\Middlewares;
 */

class AdminGuestMiddleware extends BaseMiddleware
{
    public array $actions = [];

    /**
     * AdminGuestMiddleware constructor.
     * @param array $actions
     */
    public function __construct($actions = [])
    {
        $this->actions = $actions;
    }


    public function execute()
    {
        if (Application::$app->session->get('admin')) {
            if (empty($this->actions) || in_array(Application::$app->controller->action, $this->actions)) {
                Application::$app->response->redirect('/admin/dashboard');
            }
        }
    }

}
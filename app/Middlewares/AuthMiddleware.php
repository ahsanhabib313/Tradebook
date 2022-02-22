<?php

namespace App\Middlewares;

use App\Core\Application;
use App\Core\BaseMiddleware;
use App\Core\Exception\ForbiddenException;

/**
 *
 * Class AuthMiddleware
 * @author Guru Arif <guruarifahmed@gmail.com>
 * @package App\Core\Middlewares;
 */

class AuthMiddleware extends BaseMiddleware
{
    public array $actions = [];

    /**
     * AuthMiddleware constructor.
     * @param array $actions
     */
    public function __construct($actions = [])
    {
        $this->actions = $actions;
    }


    public function execute()
    {
        if (!Application::$app->session->get('user')) {
            if (empty($this->actions) || in_array(Application::$app->controller->action, $this->actions)) {
                Application::$app->response->redirect('/admin/login');
            }
        }
    }


}
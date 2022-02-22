<?php


namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Core\Request;
use App\Core\Response;
use App\Middlewares\AuthMiddleware;

/**
 *
 * Class DashboardController
 * @author Guru Arif <guruarifahmed@gmail.com>
 * @package App\Controller
 */

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware(['dashboard']));
    }

    public function dashboard()
    {

        // $param = [
        //     "title" => "Home Page",
        //     "name" => "Modon Lal",
        //     'colors' => ['red','blue','green'],
        //     'var' => 'test var'
        // ];
        return $this->render('admin/dashboard', [
            'title' => "Dashboard"
        ]);
    }
}
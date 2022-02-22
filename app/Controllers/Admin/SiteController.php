<?php


namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Core\Request;
use App\Core\Response;
use App\Middlewares\AuthMiddleware;
use Illuminate\Database\Capsule\Manager as DB;

/**
 *
 * Class SiteController
 * @author Guru Arif <guruarifahmed@gmail.com>
 * @package App\Controller
 */

class SiteController extends Controller
{

    public function home()
    {

        $users = DB::table('users')->get();

        var_dump($users);

        $param = [
            "title" => "Home Page",
            "name" => "Modon Lal",
            'colors' => ['red','blue','green'],
            'var' => 'test var'
        ];
        return $this->render('home', $param);
    }
}
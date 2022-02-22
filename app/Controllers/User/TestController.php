<?php


namespace App\Controllers\User;

use App\Core\Controller;
use App\Core\Request;
use App\Core\Response;

/**
 *
 * Class SiteController
 * @author Guru Arif <guruarifahmed@gmail.com>
 * @package App\Controller
 */

class TestController extends Controller
{
    public function home()
    {

        $param = [
            "title" => "Home Page",
            "name" => "Modon Lal",
            'colors' => ['red','blue','green'],
            'var' => 'test var'
        ];
        return $this->render('user/test', $param);
    }
}
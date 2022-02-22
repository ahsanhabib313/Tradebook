<?php


namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Core\Request;
use App\Core\Response;

/**
 *
 * Class AccountController
 * @author Guru Arif <guruarifahmed@gmail.com>
 * @package App\Controller
 */

class AccountController extends Controller
{
    public function account()
    {
        return $this->render('account', [
            'title' => "Account"
        ]);
    }
}
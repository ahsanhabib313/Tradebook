<?php
namespace App\Controllers\Admin;
use App\Core\Controller;
use App\Core\Request;
use App\Core\Response;

/**
 *
 * Class ForgotPassController
 * @author Guru Arif <guruarifahmed@gmail.com>
 * @package App\Controller
 */


class ForgotPassController extends Controller
{
    public function forgotpass()
    {

    	$data['title'] = 'Forgot Password';
    	$data['content'] = 'Forgot Password Content';

        return $this->render('auth/forgotpassword', $data);
    }
}
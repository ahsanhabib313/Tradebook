<?php


namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Core\Request;
use App\Core\Response;

/**
 *
 * Class ProfileController
 * @author Guru Arif <guruarifahmed@gmail.com>
 * @package App\Controller
 */

class ProfileController extends Controller
{
    public function profile()
    {
        return $this->render('profile');
    }
}
<?php

namespace App\Controllers\User;

use App\Core\Application;
use App\Core\Controller;
use App\Core\Request;
use App\Core\Response;
use App\Middlewares\UserGuestMiddleware;
use App\Services\EncryptionService;
use App\Models\User;
use App\Models\User\Account;
use Illuminate\Database\Capsule\Manager as DB;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;



/**
 *
 * Class AuthController
 * @author Guru Arif <guruarifahmed@gmail.com>
 * @package App\Controller
 */

class AuthController extends Controller
{
    public function __construct()
    {
        $this->registerMiddleware(new UserGuestMiddleware([]));
    }

    public function login(Request $request, Response $response)
    {

        if ($request->isPost()) {
            $data = $request->getBody();
            $email = $request->getParam('email');
            $password = $request->getParam('password');

            $errors = [];
            $res['success'] = false;
            $res['message'] = "Fix the following errors!";

            $email = $request->getParam('email');
            $password = $request->getParam('password');


            // Error Filtering
            $requiredFields = array(
                'email',
                'password'
            );

            $errorFields = [];
            foreach ($data as $key => $value) {
                if ($data[$key] == '' && in_array($key, $requiredFields)) {
                    $errorFields[$key] =  [$key . " must not be empty"];
                }
            }

            // Error Have Or Not
            if (count($errorFields) > 0) {
                $res['errors'] = $errorFields;
                return json_encode($res);
            }


            $convert = new EncryptionService();
            $password     = $convert->encrypt_decrypt('encrypt', $password);

            if (empty($errors)) {
                $result = User::where([
                    ["email", "=", $email],
                    ["password", "=", $password]
                ])->first();

                if ($result) {

                    $this->session()->set('user', $result->id);
                    $res['success'] = true;
                    $res['message'] = "Successfully signing!";
                    $res['path'] =  '/user/news_feed';
                } else {
                    $res['message'] = "Invalid email or password!";
                }
            }

            return json_encode($res);
        }







        return $this->render('user/auth/login', [
            'title' => "Login Page"
        ]);
    }

    public function register(Request $request)
    {


        if ($request->isPost()) {
            $data = $request->getBody();

            $res['success'] = false;
            $res['message'] = 'Please fix the following errors';

            $first_name = $request->getParam('first_name');
            $last_name = $request->getParam('last_name');
            $password = $request->getParam('password');
            $dob = $request->getParam('datetimepicker');
            $gender = $request->getParam('gender');
            $email = $request->getParam('email');
            $acceptterms = $request->getParam('acceptterms');


            //  Accept Privacy   
            if (!$acceptterms) {
                $res['success'] = false;
                $res['privacyacceptserror'] = true;
                return json_encode($res);
            }

            // Error Filtering
            $requiredFields = array(
                'first_name',
                'last_name',
                'password',
                'datetimepicker',
                'gender',
                'email'
            );

            $errorFields = [];
            foreach ($data as $key => $value) {
                if ($data[$key] == '' && in_array($key, $requiredFields)) {
                    $errorFields[$key] =  [$key . " must not be empty"];
                }
            }

            // Error Have Or Not
            if (count($errorFields) > 0) {
                $res['errors'] = $errorFields;
                return json_encode($res);
            }



            // Email Already Exists
            $userSelect = User::where('email', '=', $email)->select('id')->count();
            if ($userSelect != 0) {
                $res['success'] = false;
                $res['mailexists'] = true;
                return json_encode($res);
            }


            $convert = new EncryptionService();
            $password     = $convert->encrypt_decrypt('encrypt', $password);



            $insert = User::create([
                'first_name' => $first_name,
                'last_name' => $last_name,
                'password' => $password,
                'dob' => date("Y-m-d", strtotime($dob)),
                'gender' => $gender,
                'email' => $email,
                'created_at' => date('Y-m-d h:i:s')
            ]);


            // Creating Trading Account
            Account::insert(
                [
                    'user_id' => $insert->id,
                    'server' => 'mt5',
                    'account' => substr(time(), -6),
                    'leverage' => '20',
                    'basecur' => 'USD',
                    'cpassword' => '12345',
                    'cipassword' => '12345',
                    'cppassword' => '12345'
                ]
            );



            // Application::$app->session->setFlash('success', 'Thanks for signup!');
            // Application::$app->response->redirect('/');
            if ($insert) {
                $res['success'] = true;
                $res['message'] = 'Registration Completed Successfully';
            }

            return json_encode($res);
        }

        return $this->render('user/auth/register');
    }


    public function forgetPassword(Request $request)
    {

        if ($request->isPost()) {

            $data = $request->getBody();


            $res['success'] = false;
            $res['message'] = "Fix the following errors!";

            $email = $request->getParam('email');



            // Error Filtering
            $requiredFields = array(
                'email'
            );

            $errorFields = [];
            foreach ($data as $key => $value) {
                if ($data[$key] == '' && in_array($key, $requiredFields)) {
                    $errorFields[$key] =  [$key . " must not be empty"];
                }
            }

            // Error Have Or Not
            if (count($errorFields) > 0) {
                $res['errors'] = $errorFields;
                return json_encode($res);
            }





            $usr = User::where('email', '=', $email)->first();
            if (!$usr) {
                $res['success'] = false;
                $res['message'] = "This email address is not registered";

                return json_encode($res);
            }

            $convert = new EncryptionService();
            $resetCode     = $convert->encrypt_decrypt('encrypt', $usr->id . "|" . time());

            User::where('email', $email)->update(['active_code' => $resetCode]);

            // Get ID 
            $id = $convert->encrypt_decrypt('encrypt', $usr->id);


            // $reset_link = $this->router->pathFor('user-resetPassword').'?id='.$id;

            $name = $usr->first_name . " " . $usr->last_name;



            $res['email'] = $email;

            $res['success'] = true;
            $res['message'] = "Password Reset Instraction Send To Your Mail";

            return json_encode($res);
        }

        return $this->render('user/auth/forgetpassword', [
            'title' => "Forget Password"
        ]);
    }


    public function resetpassword(Request $request)
    {
        $id = $request->getParam('id');

        $convert = new EncryptionService();
        // $id = $convert->encrypt_decrypt('decrypt', $id);
        $emailAddress = '';

        $usrDetails = User::where('id', '=', $id)->select('email')->first();
        if ($usrDetails) {
            $emailAddress = $usrDetails->email;
        }


        if ($request->isPost()) {

            $data = $request->getBody();


            $res['success'] = false;
            $res['message'] = "Fix the following errors!";

            $email = $request->getParam('email');
            $password = $request->getParam('password');
            $cpassword = $request->getParam('confirm_password');

            if ($password != $cpassword) {
                $res['success'] = false;
                $res['message'] = "Password and Confirm Password didn't meatch";
                return json_encode($res);
            }



            // Error Filtering
            $requiredFields = array(
                'password',
                'confirm_password'
            );

            $errorFields = [];
            foreach ($data as $key => $value) {
                if ($data[$key] == '' && in_array($key, $requiredFields)) {
                    $errorFields[$key] =  [$key . " must not be empty"];
                }
            }

            // Error Have Or Not
            if (count($errorFields) > 0) {
                $res['errors'] = $errorFields;
                return json_encode($res);
            }





            $usr = User::where('email', '=', $email)->first();

            if (!$usr) {
                $res['success'] = false;
                $res['message'] = "Something is wrong. Please try again";

                return json_encode($res);
            }


            $convert = new EncryptionService();
            $password = $convert->encrypt_decrypt('encrypt', $password);

            $userSignup = User::where('email', $email)->update(['password' => $password]);


            $res['email'] = $email;

            $res['success'] = true;
            $res['message'] = "Password Reset Instructions Send To Your Mail";

            return json_encode($res);
        }

        return $this->render('user/auth/resetpassword', [
            'title' => "Reset Password",
            'email' => $emailAddress
        ]);
    }


    public function logout(Request $request, Response $response)
    {
        Application::$app->session->remove('user');
        $response->redirect('/user/login');
    }

    public function profile()
    {
        return $this->render('profile');
    }
}

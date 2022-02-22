<?php
namespace App\Controllers\Admin\Auth;

use App\Core\Application;
use App\Core\Controller;
use App\Core\Request;
use App\Core\Response;
use App\Middlewares\AdminGuestMiddleware;
use App\Models\Admin;
use Illuminate\Database\Capsule\Manager as DB;

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
        $this->registerMiddleware(new AdminGuestMiddleware(['login']));
    }

    public function login(Request $request, Response $response)
    {
        if ($request->isPost()){
            $errors = [];
            $res['success'] = false;
            $res['message'] = "Fix the following errors!";

            $email = $request->getParam('email');
            $password = $request->getParam('password');

            if($email == ""){
                $errors['email'] = "Email is required!";
            }

            if($password == ""){
                $errors['password'] = "Password is required!";
            }

            if($errors){
                $res['errors'] = $errors;
            }

            if (empty($errors)) {
                $result = Admin::where([
                    ["email", "=", $email],
                    ["password", "=", $password]
                ])->first();

                if($result){
                    $this->session()->set('user', $result->email);
                    $res['success'] = true;
                    $res['message'] = "Successfully signing!";
                }else{
                    $res['message'] = "Invalid email or password!";
                }
            }
            
            return json_encode($res);
        }

        return $this->render('admin/auth/login');
    }

    public function register(Request $request)
    {
        if ($request->isPost()){
            $data = $request->getBody();
            var_dump($data);
            $name = $request->getParam('name', 'none');
            $email = $request->getParam('email');
            $password = $request->getParam('password');

            User::create([
                'name' => $name,
                'email' => $email,
                'password' => $password
            ]);
            Application::$app->session->setFlash('success', 'Thanks for signup!');
            Application::$app->response->redirect('/');
        }

        return $this->render('register');
    }

    public function logout(Request $request, Response $response)
    {
        Application::$app->session->remove('admin');
        $response->redirect('/admin/login');
    }

    public function profile()
    {
        return $this->render('profile');
    }
}
<?php
namespace App\Controller;

use App\Core\Controller;
use App\Core\Auth;
use App\Helpers\Request;
use App\Helpers\Redirect;
use App\Models\Model;

class AuthController extends Controller
{
    
    private $request;
    private $userInfo;

    public function __construct()
    {
        $this->request  = new Request;
    }

    public function login()
    {
        $this->render('auth.login',[]);
    }

    public function authentication()
    {
        if ( $this->request->post() ) {

            $credentials = [
                'username' => $this->request->username,
                'password' => $this->request->password
            ];

            if ( Auth::check($credentials) ) {
                return Redirect::to('admin/index');
            } else {
                Redirect::to('login')
                        ->withErrors('Please check your username or password');    
            }

        }
    }
}

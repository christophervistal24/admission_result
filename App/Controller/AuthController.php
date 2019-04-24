<?php
namespace App\Controller;

use App\Core\Auth;
use App\Core\Controller;
use App\Helpers\Redirect;

class AuthController extends Controller
{
    public function index()
    {
        $this->render('auth.login',[]);
    }

    public function authentication()
    {
        $request = load('Helpers\Request');
        
        if ( $request->post() ) {

            $credentials = [
                'username' => $request->username,
                'password' => $request->password
            ];

            if ( Auth::verify($credentials) ) {
                return Redirect::to('admin/index');
            } else {
                Redirect::to('login')
                        ->withErrors('Please check your username or password');    
            }

         }
    }
}

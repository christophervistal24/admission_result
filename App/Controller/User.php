<?php
namespace App\Controller;

use App\Core\Auth;
use App\Core\Controller;
use App\Helpers\Redirect;
use App\Models\UserInfo;

class User extends Controller
{
    public function __construct()
    {
        $this->request = load('Helpers\Request');
        $this->user = load('Models\User');
        $this->userInfo = load('Models\UserInfo');
    }

    public function index()
    {
        $this->render('admin.user.index',[
            'title' => 'List of all users',
            'users' => $this->userInfo->userWithLoginInfo(),
        ]);
    }

    public function create()
    {
        $this->render('admin.user.create',[
            'title' => 'Create new user',
        ]);
    }

    public function store()
    {
        $userLoginInfo = $this->user->create([
            'username'   => $this->request->username,
            'password'   => password_hash($this->request->password, PASSWORD_DEFAULT),
            'created_at' => time(),
        ]);

        if ( $userLoginInfo ) {
            UserInfo::create([
                'user_id'    => $userLoginInfo->getLastInsertedId(),
                'firstname'  => $this->request->firstname,
                'middlename' => $this->request->middlename,
                'lastname'   => $this->request->lastname,
                'birthdate'  => $this->request->birthdate,
                'gender'     => $this->request->gender,
                'profile'    => $this->request->profile['name'],
            ]);
            $destination = APP['URL_ROOT'] . 'assets/img/uploads/' . $this->request->profile['name'];
            // Upload
            move_uploaded_file($this->request->profile['tmp_name'], $destination);
            return Redirect::to('user/create');
        }
    }

    public function edit()
    {

        $this->render('admin.user.edit',[
            'title' => 'Edit user',
            'user' => $this->userInfo->withCredentials($this->request->id),
        ]);
    }

    public function update()
    {
        // update the user info
        $userInfo = $this->userInfo->find($this->request->id);
        
        
        $profileImg = !empty($this->request->profile['name']) 
                        ? Auth::user()->profile : $this->request->profile['name'];

        $userId = $userInfo->user_id;

        $userInfo->firstname  = $this->request->firstname;
        $userInfo->middlename = $this->request->middlename;
        $userInfo->lastname   = $this->request->lastname;
        $userInfo->gender     = $this->request->gender;
        $userInfo->profile    = $profileImg;
        $userInfo->save();

        $destination = APP['URL_ROOT'] . 'assets/img/uploads/' . $profileImg;
        if ( !empty($profileImg) ) {
            // Upload
            move_uploaded_file($this->request->profile['tmp_name'], $destination);
        }

        $userLoginInfo = $this->user->find($userId);

        $userPassword = empty($this->request->password) 
                                        ? password_hash($this->request->password, PASSWORD_DEFAULT) : $userLoginInfo->password;

        $userLoginInfo->username   = $this->request->username;
        $userLoginInfo->password   = $userPassword;
        $userLoginInfo->updated_at = time();
        $userLoginInfo->save();

        return Redirect::to('user/edit?id=' . $userLoginInfo->id );
    }
}

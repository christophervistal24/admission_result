<?php 
namespace App\Core;

use App\Models\UserInfo;
use App\Models\User;
use App\Helpers\Session;

class Auth
{
    // Set up columns that will fetch.
    private static $fetchOnly = [ 'id', 'username', 'password'];
    private static $models = [];

    private static function isAuthorize(array $credentials = [])
    {
        // Find the user in Database
        return (new User)->where('username', $credentials['username'], self::$fetchOnly);
    }

    private static function checkCredentials($fetchedCredential, $inputtedCredential) : bool
    {
        return !empty($fetchedCredential->username) 
               && password_verify($inputtedCredential['password'], $fetchedCredential->password);        
    }

    public static function verify(array $credentials = []) : bool
    {
        $user = self::isAuthorize($credentials);

        if ( self::checkCredentials($user, $credentials) ) {
            // Temporary
            Session::set('id',$user->id);
            return true; 
        }

        return false;
    }

    public static function hasLogin() :bool
    {
        // Temporary
        return Session::has('id');
    }

    private function authDataFromDB(string $property) :string
    {
      // The reason why it is in local scope
      // to avoid having a side effect and performance issue.
      $user     = load('Models\User');
      $userInfo = load('Models\UserInfo');

      $userId = Session::get('id');
      return $user->where('id',$userId)->$property 
             ?? $userInfo->where('user_id', $userId)->$property;
      
    }

    public function __get(string $property)
    {
        // If there's no data in session we inforce the method to request in DB
        if ( Session::has($property) ) {
            return Session::get($property);
        } else {
            $fetchedData = $this->authDataFromDB($property);
            Session::set($property, $fetchedData);
            return $fetchedData;
        }
    }

    public static function user()
    {
        return new self;
    }
  
}

<?php 
namespace App\Core;

use App\Models\UserInfo;
use App\Models\User;
use App\Helpers\Session;

class Auth
{
    // Set up columns that will fetch.
    private static $fetchOnly = [ 'id', 'username', 'password','updated_at'];
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

    private function requestToDB(string $property) :string
    {
      $userId = Session::get('id');
      $data = User::where('id', $userId)->$property 
                    ?? UserInfo::where('user_id', $userId)->$property;
      return $data;
    }

    public function __get(string $property)
    {
        // If there's no data in session we inforce the method to request in DB
        if ( !Session::has($property) ) {
            $userData = $this->requestToDB($property);
            Session::set($property, $userData);
            return $userData;
        }
        return Session::get($property);
    }

    public static function user()
    {
        return new self;
    }
  
}

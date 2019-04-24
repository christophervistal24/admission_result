<?php 
namespace App\Core;

use App\Models\User;

class Auth
{
    // Set up columns that will fetch.
    private static $fetchOnly = [ 'id', 'username', 'password'];

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
            $_SESSION['id'] =  $user->id; 
            return true; 
        }

        return false;
    }
  
}

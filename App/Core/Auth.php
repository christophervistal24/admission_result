<?php 
namespace App\Core;

use App\Models\User;

class Auth 
{
    public static function check(array $credentials = []) : bool
    {

        // Assign the value of array with same with to a variable.
        ['username' => $username , 'password' => $password] = $credentials;

        // Set up columns that will fetch.
        $fetchOnly = [ 'id', 'username', 'password'];

        // Execute a query
        $credentials = (new User)->where('username', $username, $fetchOnly);

        dd($credentials);
        
        // Temporary
        $_SESSION['id'] = $credentials->id;

        // Authenticate the user
        return !empty($credentials) && password_verify($password, $credentials->password);

    }
}

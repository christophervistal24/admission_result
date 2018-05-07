<?php
namespace App\Model;
use App\Core\Database;
use App\Core\Functions;
use PDO;
class User extends Database
{
    use Functions;

    public function userLogin(array $data)
    {
        if ($this->is_post() === TRUE) {
            $user_input = extract($this->escape($data));
        }
        return;
    }
}

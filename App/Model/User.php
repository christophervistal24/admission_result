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
            extract($this->escape($data));
            $sql =
            "
                SELECT username,password
                FROM tbl_users
                WHERE username = '$username' AND password = '$password'
            ";

            $result = $this->db->query($sql);
            $count = $result->rowCount();
            if($count <= 0 ){
                echo 'No user';
            }else{
                echo 'Good';//check hash and redirect
            }
         }
    }
}

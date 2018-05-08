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

    public function getAllCourse()
    {
        return $this->db->query("SELECT course.id , course.course , departments.department_name FROM course
            LEFT JOIN departments ON course.dept_id = departments.id ORDER BY course.dept_id")->fetchAll(PDO::FETCH_ASSOC);
    }

   /* public function getByOrGetAll(array $data = null)
    {
        $clause = $this->lastElementKeyAndvalue($data);
        if (strpos($clause['where_clause'], 'where') !== false) {
            return $this->db->query("
            SELECT  " . implode(',',$data['fields']) . " FROM " . $data['table'] . "
             " . $clause['where_clause'] . '=' . $clause['where_clause_value'] . " ")->fetch(PDO::FETCH_ASSOC);
        }

          return  $this->db->query(" SELECT  " . implode(',',$data['fields']) . "  FROM " . $data['table'] . " ")
                                   ->fetchAll(PDO::FETCH_ASSOC);
    }*/

}

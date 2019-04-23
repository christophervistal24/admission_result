<?php
namespace App\Model;
use App\Core\Database;
use App\Core\Functions;
use PDO;
use RuntimeException;

class User extends Database
{
    use Functions;

    public function userLogin(array $data)
    {
        if ($this->is_post() === TRUE) {
            extract($this->escape($data));
            $sql =
            "
                SELECT username,password,id
                FROM tbl_users
                WHERE username = '$username'
            ";

            $result = $this->db->query($sql)->fetch(PDO::FETCH_ASSOC);
            if(!$this->is_user([
                'input_password'   => $password,
                'password_from_db' => $result['password'],
            ])){
                return false;
            }else{
                $_SESSION['id'] = $result['id'];
                header("Location:/system/admin/dashboard");
            }
         }
    }

    public function getUserInfoById($id)
    {
        return $this->db->query("
            SELECT
            `tbl_users`.`id`,
            `tbl_user_info`.`id` AS info_id,
            `tbl_users`.`username`,
            `tbl_users`.`password`,
            `tbl_user_info`.`firstname`,
            `tbl_user_info`.`middlename`,
            `tbl_user_info`.`lastname`,
            `tbl_user_info`.`gender`,
            `tbl_user_info`.`birthdate`,
            `tbl_user_info`.`profile`,
            `tbl_users`.`created_at`,
            `tbl_users`.`updated_at`
            FROM
            `tbl_users`
            INNER JOIN tbl_user_info ON tbl_users.id = tbl_user_info.user_id WHERE tbl_users.id = '$id'
        ")->fetch(PDO::FETCH_ASSOC);
    }

    public function getAllCourse()
    {
        return $this->db->query("SELECT course.id , course.course , departments.department_name FROM course
            LEFT JOIN departments ON course.dept_id = departments.id ORDER BY course.dept_id")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllAdmissionResult()
    {
        return $this->db->query("
        SELECT
            `admission_result`.`id`,
             CONCAT(`examiner_info`.`lastname` , ' , ', `examiner_info`.`firstname` , ' ' , `examiner_info`.`middlename`,'.') as Name,
            -- `entrace_rating`.`verbal_comprehension`,
            -- `entrace_rating`.`verbal_reasoning`,
            -- `entrace_rating`.`figurative_reasoning`,
            -- `entrace_rating`.`quantitative_reasoning`,
            `entrace_rating`.`verbal_total`,
            `entrace_rating`.`non_verbal_total`,
            `entrace_rating`.`over_all_total`
          -- `course`.`course` as first_course,
          -- `course_2`.`course` as second_course
        FROM
            admission_result
            INNER JOIN examiner_info ON admission_result.examiner_info_id = examiner_info.id
            LEFT JOIN entrace_rating ON admission_result.entrace_rating_id = entrace_rating.id
            INNER JOIN course ON admission_result.preferred_course_id_1 = course.id
            WHERE `admission_result`.`is_delete` = 'NO'
         --   LEFT JOIN course AS course_2
       -- ON
          --  admission_result.preferred_course_id_2 = course_2.id
        ")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAdmissionResultById($id)
    {
            return $this->db->query("
              SELECT
              CONCAT(`examiner_info`.`firstname` , ' ' , `examiner_info`.`middlename` , '. ' , `examiner_info`.`lastname`) as Fullname,
                `examiner_info`.`id` as examiner_info_id,
                `entrace_rating`.`id` as entrance_rating_id,
                `admission_result`.`id` as admission_result_id,
                `admission_result`.`exam_at`,
                `examiner_info`.`firstname`,
                `examiner_info`.`middlename`,
                `examiner_info`.`lastname`,
                `examiner_info`.`sex`,
                `examiner_info`.`age`,
                `examiner_info`.`birthdate`,
                `entrace_rating`.`verbal_comprehension`,
                `entrace_rating`.`verbal_reasoning`,
                `entrace_rating`.`figurative_reasoning`,
                `entrace_rating`.`quantitative_reasoning`,
                `entrace_rating`.`verbal_total`,
                `entrace_rating`.`non_verbal_total`,
                `entrace_rating`.`over_all_total`, `course`.`course` as first_course,
                `course_2`.`course` as second_course , `guidance_conselors`.`fullname` ,
                `guidance_conselors`.`id`
            FROM
                admission_result
            INNER JOIN examiner_info ON admission_result.examiner_info_id          = examiner_info.id
            LEFT JOIN entrace_rating ON admission_result.entrace_rating_id         = entrace_rating.id
            INNER JOIN course ON admission_result.preferred_course_id_1            = course.id
            LEFT JOIN course AS course_2 ON admission_result.preferred_course_id_2 = course_2.id
            LEFT JOIN guidance_conselors ON guidance_conselors.id                  = admission_result.guidance_counselor_id
            WHERE admission_result.id = ' $id '
            ")->fetch(PDO::FETCH_ASSOC);
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

    public function modify_admission_result($id,$keyword)
    {
        $result = $this->db->query("
           UPDATE
            `admission_result`
            SET
                `is_delete` = '$keyword'
            WHERE
                `id` = '$id'
        ");

        if($result == true){
                header("Location:/system/admin/dashboard");
        }
    }

    public function get_deleted_admission_results()
    {
       return $this->db->query("
         SELECT
            `admission_result`.`id`,
            `admission_result`.`examiner_info_id`,
            `admission_result`.`entrace_rating_id`,
             CONCAT(`examiner_info`.`firstname` , ' ' , `examiner_info`.`middlename` , '. ' , `examiner_info`.`lastname`) as Fullname
        FROM
            `admission_result`
        INNER JOIN examiner_info ON admission_result.examiner_info_id = examiner_info.id
        WHERE
            admission_result.is_delete = 'YES'
        ")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function permanent_delete_admission(array $id = null)
    {
            $this->db->beginTransaction();
            try {

                $stmt1 = $this->db->prepare("
                    DELETE FROM `entrace_rating`   WHERE id = ?
                ");

                $stmt1->execute([
                    $id['entrace_rating_id'],
                ]);

                if ($stmt1->rowCount() < 1) {
                    throw new RuntimeException("Delete from table1 matched no rows.");
                 }

                $stmt2 = $this->db->prepare("
                    DELETE FROM `examiner_info`    WHERE id = ?
                ");

                $stmt2->execute([
                    $id['examiner_info_id'],
                ]);

                 if ($stmt2->rowCount() < 1) {
                    throw new RuntimeException("Delete from table2 matched no rows.");
                 }

                $stmt3 = $this->db->prepare("
                    DELETE FROM `admission_result` WHERE id = ?
                ");

                $stmt3->execute([
                    $id['admission_id']
                ]);

                if ($stmt3->rowCount() < 1) {
                    throw new RuntimeException("Delete from table3 matched no rows.");
                 }

                $result = $this->db->commit();
                if($result == true){
                    header("Location:/system/admin/dashboard");
                }
            } catch (PDOException $e) {
                $this->db->rollBack();
                die($e->getMessage());
            }
    }

    public function getAllGuidanceConselors()
    {
        return $this->db->query("
           SELECT
                `id`,
                `fullname`,
                `position`,
                `signature`,
                `created_at`,
                `updated_at`
            FROM
                `guidance_conselors`
        ")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getGuidanceConselorByName($id)
    {
        return $this->db->query("
           SELECT
                `id`,
                `fullname`,
                `position`,
                `signature`,
                `created_at`,
                `updated_at`
            FROM
                `guidance_conselors` WHERE `id` = '$id'
        ")->fetch(PDO::FETCH_ASSOC);
    }

    public function checkPassword($id,$password)
    {
        $result = $this->db->query("SELECT password FROM tbl_users WHERE id = '$id'")->fetch(PDO::FETCH_ASSOC);
        if ($this->is_user([
            'input_password' => $password,
            'password_from_db' => $result['password'],
        ])) {
            return true;
        }
        return false;
    }

    public function count_user()
    {
        return $this->db->query("SELECT username FROM tbl_users")->fetchAll(PDO::FETCH_ASSOC);
    }

}

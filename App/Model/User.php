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
                `examiner_info`.`firstname`,
                `examiner_info`.`lastname`,
                `examiner_info`.`middlename`,
                `examiner_info`.`sex`,
                `examiner_info`.`age`,
                `examiner_info`.`birthdate`,
                `entrace_rating`.`verbal_comprehension`,
                `entrace_rating`.`verbal_reasoning`,
                `entrace_rating`.`figurative_reasoning`,
                `entrace_rating`.`quantitative_reasoning`,
                `entrace_rating`.`verbal_total`,
                `entrace_rating`.`non_verbal_total`,
                `entrace_rating`.`over_all_total`,
                `course`.`id` as course_id,
                `course`.`course` as first_course,
                `course_2`.`course` as second_course,
                `admission_result`.`guidance_counselor`,
                `admission_result`.`exam_at`
            FROM
                admission_result
                INNER JOIN examiner_info ON admission_result.examiner_info_id = examiner_info.id
                LEFT JOIN entrace_rating ON admission_result.entrace_rating_id = entrace_rating.id
                INNER JOIN course ON admission_result.preferred_course_id_1 = course.id
                LEFT JOIN course AS course_2
            ON
                admission_result.preferred_course_id_2 = course_2.id
            WHERE
                admission_result.id = ' $id '
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

}

<?php
namespace App\Models;

use App\Core\QueryBuilder as DB;
use App\Models\Model;
use PDO;

class AdmissionResult extends Model
{
    protected $table      = 'admission_result';
    protected $primaryKey = 'id';
    protected $columns    = [];

    public function __construct()
    {
        parent::__construct();

        // Get all columns of table
        $this->columns = parent::columns();

    }

    public function rankings()
    {
        return DB::table('admission_result')
                 ->join('examiner_info','admission_result.examiner_info_id','=','examiner_info.id')
                 ->join('entrace_rating','admission_result.entrace_rating_id','=','entrace_rating.id')
                 ->where('admission_result.is_delete','=','NO')
                 ->select("CONCAT(examiner_info.firstname, ' ',
                          examiner_info.middlename, ' ' ,
                          examiner_info.lastname) as fullname "
                          ,'over_all_total'
                          ,'admission_result.id')
                 ->limit('10')
                 ->orderBy('over_all_total')
                 ->get();
    }

   public function deletedResults()
   {
      return $this->results('YES');
   }


   public function results(string $deleted = 'NO')
   {
      return DB::table('admission_result')
               ->join('examiner_info','admission_result.examiner_info_id','=','examiner_info.id')
               ->leftJoin('entrace_rating','admission_result.entrace_rating_id','=','entrace_rating.id')
               ->join('course','admission_result.preferred_course_id_1','=','course.id')
               ->where('admission_result.is_delete','=',$deleted)
               ->select('admission_result.id','entrace_rating.verbal_total',
                         'entrace_rating.non_verbal_total','entrace_rating.over_all_total',
                         "CONCAT(`examiner_info`.`lastname` , ' , ', `examiner_info`.`firstname` , ' ' , `examiner_info`.`middlename`,'.') as Name")
                ->get();
   }

    public function resultById(int $id)
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
                `guidance_conselors`.`id`,
                `guidance_conselors`.`signature`,
                `guidance_conselors`.`position`
            FROM
                admission_result
            INNER JOIN examiner_info ON admission_result.examiner_info_id          = examiner_info.id
            LEFT JOIN entrace_rating ON admission_result.entrace_rating_id         = entrace_rating.id
            INNER JOIN course ON admission_result.preferred_course_id_1            = course.id
            LEFT JOIN course AS course_2 ON admission_result.preferred_course_id_2 = course_2.id
            LEFT JOIN guidance_conselors ON guidance_conselors.id                  = admission_result.guidance_counselor_id
            WHERE admission_result.id = ' $id '
            ")->fetch(PDO::FETCH_OBJ);
    }
    

    public function fullDetailsById(int $id)
    {
        return $this->db->query("
        SELECT
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
            `course_2`.`course` as second_course ,`guidance_conselors`.`fullname` as guidance_counselor,
            `guidance_conselors`.`position` as position , `guidance_conselors`.`signature`
        FROM
            admission_result
        INNER JOIN examiner_info ON admission_result.examiner_info_id = examiner_info.id
        LEFT JOIN entrace_rating ON admission_result.entrace_rating_id = entrace_rating.id
        INNER JOIN course ON admission_result.preferred_course_id_1 = course.id
        LEFT JOIN course AS course_2 ON admission_result.preferred_course_id_2 = course_2.id
        LEFT JOIN guidance_conselors ON guidance_conselors.id = admission_result.guidance_counselor_id
        WHERE
    admission_result.id = ' $id '
        ")->fetch(PDO::FETCH_ASSOC);
    }    

}

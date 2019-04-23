<?php
namespace App\Models;

use PDO;
use App\Models\Model;

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

        // Remove the primary key
        array_shift($this->columns);

    }

   public function deletedResults()
   {
      return $this->results('YES');
   }


   public function results(string $deleted = 'NO')
   {
      return $this->db->query("
        SELECT
            `admission_result`.`id`,
             CONCAT(`examiner_info`.`lastname` , ' , ', `examiner_info`.`firstname` , ' ' , `examiner_info`.`middlename`,'.') as Name,
            `entrace_rating`.`verbal_total`,
            `entrace_rating`.`non_verbal_total`,
            `entrace_rating`.`over_all_total`
        FROM
            admission_result
            INNER JOIN examiner_info ON admission_result.examiner_info_id  = examiner_info.id
            LEFT JOIN entrace_rating ON admission_result.entrace_rating_id = entrace_rating.id
            INNER JOIN course ON admission_result.preferred_course_id_1    = course.id
            WHERE `admission_result`.`is_delete`  = '$deleted'
        ")->fetchAll(PDO::FETCH_ASSOC);
   }

}

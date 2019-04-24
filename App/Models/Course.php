<?php
namespace App\Models;

use PDO;
use App\Models\Model;

class Course extends Model
{
    protected $table      = 'course';
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

    public function getCourse()
    {
        return $this->db->query("
            SELECT course.id , course.course , departments.department_name FROM course
            LEFT JOIN departments ON course.dept_id = departments.id ORDER BY course.dept_id
            ")->fetchAll(PDO::FETCH_ASSOC);
    }

}

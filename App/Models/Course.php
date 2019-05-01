<?php
namespace App\Models;

use PDO;
use App\Models\Model;
use App\Core\QueryBuilder as DB;

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
        return DB::table('course')
                ->leftJoin('departments','course.dept_id','=','departments.id')
                ->select(
                    'course.id',
                    'course.course',
                    'course.course_abbr',
                    'departments.department_short_name'
                )->get();
    }

}

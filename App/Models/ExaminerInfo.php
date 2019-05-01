<?php
namespace App\Models;

use PDO;
use App\Models\Model;

class ExaminerInfo extends Model
{
    protected $table      = 'examiner_info';
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

}

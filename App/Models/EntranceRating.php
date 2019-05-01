<?php
namespace App\Models;

use PDO;
use App\Models\Model;

class EntranceRating extends Model
{
    protected $table      = 'entrace_rating';
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

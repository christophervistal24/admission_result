<?php
namespace App\Models;

use PDO;
use App\Models\Model;

class User extends Model
{
    protected $table      = 'tbl_users';
    protected $primaryKey = 'id';
    protected $columns    = [];

    public function __construct()
    {
        parent::__construct();

        // Get all columns of table
        $this->columns = parent::columns();

    }

   
}

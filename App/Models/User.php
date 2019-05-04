<?php
namespace App\Models;

use App\Core\Auth;
use App\Helpers\Session;
use App\Models\Model;
use PDO;

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

    public function save()
    {
        parent::save();
        $user = $this->find(Session::get('id'),['username']);
        Session::set('username',$user->username);
    }
}

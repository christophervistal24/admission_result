<?php
namespace App\Models;

use App\Core\Auth;
use App\Helpers\Session;
use App\Models\Model;
use App\Core\QueryBuilder as DB;
use PDO;

class UserInfo extends Model
{
    protected $table      = 'tbl_user_info';
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

        $userInfo = $this->where('user_id',Session::get('id'),
        [
            'lastname','firstname','middlename',
            'profile','gender','birthdate','user_id'
        ]);

        // Update 
        foreach ($userInfo as $columns => $value) {
            Session::set($columns,$value);
        }

    }

    public function userWithLoginInfo()
    {
      return DB::table('tbl_users')
           ->join('tbl_user_info','tbl_users.id','=','tbl_user_info.user_id')
           ->select('tbl_users.id','tbl_user_info.id AS info_id','tbl_users.username',
            'tbl_users.password','tbl_user_info.firstname','tbl_user_info.middlename',
            'tbl_user_info.lastname','tbl_user_info.gender','tbl_user_info.birthdate',
            'tbl_user_info.profile','tbl_users.created_at'
            )->get(PDO::FETCH_OBJ);
    }

   /* public function withCredentials(int $id)
    {
        return DB::table('tbl_users')
           ->join('tbl_user_info','tbl_users.id','=','tbl_user_info.user_id')
           ->where('tbl_users.id','=',$id)
           ->select(
            'tbl_users.id','tbl_user_info.id AS info_id','tbl_users.username',
            'tbl_users.password','tbl_user_info.firstname','tbl_user_info.middlename',
            'tbl_user_info.lastname','tbl_user_info.gender','tbl_user_info.birthdate',
            'tbl_user_info.profile','tbl_users.created_at'
            )->get(PDO::FETCH_OBJ);
    }*/
}

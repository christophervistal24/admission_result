<?php
namespace App\Models;

use PDO;
use App\Models\Model;

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

    public function userWithLoginInfo()
    {
        
        return $this->db->query("
            SELECT
            `tbl_users`.`id`,
            `tbl_user_info`.`id` AS info_id,
            `tbl_users`.`username`,
            `tbl_users`.`password`,
            `tbl_user_info`.`firstname`,
            `tbl_user_info`.`middlename`,
            `tbl_user_info`.`lastname`,
            `tbl_user_info`.`gender`,
            `tbl_user_info`.`birthdate`,
            `tbl_user_info`.`profile`,
            `tbl_users`.`created_at`
            FROM
            `tbl_users`
            INNER JOIN tbl_user_info ON tbl_users.id = tbl_user_info.user_id
        ")->fetchAll(PDO::FETCH_OBJ);
    }

    public function withCredentials(int $id)
    {
         return $this->db->query("
            SELECT
            `tbl_users`.`id`,
            `tbl_user_info`.`id` AS info_id,
            `tbl_users`.`username`,
            `tbl_users`.`password`,
            `tbl_user_info`.`firstname`,
            `tbl_user_info`.`middlename`,
            `tbl_user_info`.`lastname`,
            `tbl_user_info`.`gender`,
            `tbl_user_info`.`birthdate`,
            `tbl_user_info`.`profile`,
            `tbl_users`.`created_at`,
            `tbl_users`.`updated_at`
            FROM
            `tbl_users`
            INNER JOIN tbl_user_info ON tbl_users.id = tbl_user_info.user_id WHERE tbl_users.id = '$id'
        ")->fetch(PDO::FETCH_OBJ);
    }
}

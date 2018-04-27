<?php
namespace App\Model;
use \App\Model\Database as DB;
class User extends DB
{
    public static function fetch_data()
    {
        return parent::sample_fetch();
    }
}
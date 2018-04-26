<?php
namespace App\Model;
class User extends \App\Model\Database
{
    public static function fetch_data()
    {
        return parent::sample_fetch();
    }
}
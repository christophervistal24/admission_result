<?php
namespace App\Core;
use PDO;
class Database
{
    private $dbserver = 'localhost' , $dbname = 'evaluation' , $db_user = 'root', $db_pass;
    protected $db = null;

    public function __construct()
    {
        $this->db = new PDO("mysql:host=$this->dbserver;dbname=$this->dbname;",$this->db_user,$this->db_pass);
    }
}
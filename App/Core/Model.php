<?php
namespace App\Core;
use PDO;
class Database
{
    private $dbserver = 'localhost' , $dbname = 'admission' , $db_user = 'root', $db_pass = '';
    protected $db = null;

    public function __construct()
    {
         $this->db = new PDO("mysql:host=$this->dbserver;dbname=$this->dbname;",$this->db_user,$this->db_pass,[
         PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
         PDO::ATTR_EMULATE_PREPARES => false
        ]);
    }

    public function connect()
    {
        return $this->db;
    }
}
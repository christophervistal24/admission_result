<?php
namespace App\Core;

use PDO;
use Exception;

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

    public function transaction($function)
    {
        // Create new instance of this object to call this method statically.
        $self = new static; 

        $self->db->beginTransaction();
        try {
            $function();
            $self->db->commit();
        } catch (Exception $e) {
            $self->db->rollBack();
        }
    }

    public function getLastInsertedId()
    {
        return $this->db->lastInsertId() ?? null;
    }

    protected function columnsIn(string $table_name)
    {
        // Query to get columns from table
        $query = $this->db->query("
                SELECT COLUMN_NAME 
                FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = '" . $this->dbname . "' 
                AND TABLE_NAME = '" . $table_name . "'
            ");

        while($row = $query->fetch()){
            $result[] = $row;
        }

        return array_column($result, 'COLUMN_NAME');
    } 
}

<?php 
namespace App\Models;

use App\Core\Database;
use App\Helpers\Database\QueryHelper;
use App\Helpers\Str;
use PDO;

abstract class Model extends Database
{

    // TODO Add escape for every query params

    protected $table;

    protected $primaryKey;

    protected $columns = [];

    // protected $query = [];

    public function __construct()
    {
        parent::__construct();
    }

    protected function columns() :array
    {
        return parent::columnsIn($this->table);
    }

    private function setModelProperties(array $fields = [])
    {
        // Set a values for a model properties
        foreach ($fields as $property => $value) {
          $this->$property = $value;
        }
    }

    public static function __callStatic($name, $arguments)
    {
        call_user_func_array([self,$name], $arguments);
    }

    private function selectOnly(int $id , array $columns = ['*']) :string
    {
        $query = "SELECT " . implode(',',$columns) . " FROM {$this->table} WHERE id ='$id'";

        return $query;
    }

    private function select(array $columns = ['*']) :string
    {
        $query = "SELECT " . implode(',',$columns) . " FROM {$this->table}";

        return $query;
    }

    private function fetch(string $where, string $where_value, array $columns = ['*']) :string
    {
        $query = "SELECT " . implode(',',$columns) . " FROM {$this->table} 
                  WHERE ".$where." = '".$where_value."' ";

        return $query;
    }


    private function insert(array $values = []) :string
    {
        // Function that will order the values by exact order of table columns
        // and also if the list has a value that not in table columns,
        // it will automatically remove.
        $values = QueryHelper::removeUnnecessaryColumns( 
                        QueryHelper::reOrderGivenFields($values, $this->columns)
          , $this->columns);

        // Prepare columns and values
        ['columns' => $columns, 'values' => $values] = QueryHelper::columnsAndValues($values);

        $query =  "INSERT INTO {$this->table} (" . $columns . ") VALUES (" . $values . ")";

        return $query;
    }

    private function update()
    {
        // Prefix for Update
        $query   = "UPDATE {$this->table} SET ";

        // Prepare a SET statement
        $columns = QueryHelper::prepareSetStatement($this->columns,$this);
     
        // Build a Query
        $query = $query . $columns . " WHERE {$this->primaryKey} = '" . 
                 $this->{$this->primaryKey} . "' LIMIT 1";

        return $query;
    }

    private function delete() :string
    {
        $query = "
            DELETE 
            FROM {$this->table} 
            WHERE  " . $this->primaryKey . " = '" . $this->{$this->primaryKey} . "' 
            LIMIT 1
        ";

        return $query;
    }

    private function countData()
    {
        $query = "SELECT COUNT(id) as count FROM {$this->table}";

        return $query;
    }

    public function get(array $columns = ['*']) :array 
    {
        return $this->db->query($this->select($columns))
                        ->fetchAll(PDO::FETCH_OBJ);
    }

    public function where(string $where, string $where_value, array $columns = ['*'])
    {
        $self = new static;
        return $self->db->query($self->fetch($where,$where_value,$columns))
                 ->fetch(PDO::FETCH_OBJ);
    }

    public function create(array $values = [])
    {
        $self = new static;
        $self->db->query($self->insert($values));
        return $self;
    }

    public function save()
    {
        $this->db->query($this->update());
    }

    public function find(int $id , array $columns = ['*']) :object 
    {
        $self = new static;
        $result = $self->db->query($self->selectOnly($id, $columns))
                           ->fetch(PDO::FETCH_OBJ);

        $self->setModelProperties( (array) $result);
        return $self;
    }

    public function destroy()
    {
        return $this->db->query($this->delete());
    }

    public function count()
    {
        return $this->db->query($this->countData())
                         ->fetch(PDO::FETCH_OBJ);
    }

}

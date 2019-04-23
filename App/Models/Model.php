<?php 
namespace App\Models;

use PDO;
use App\Core\Database;
use App\Helpers\Database\QueryHelper;

abstract class Model extends Database
{
    // TODO Extract this to QueryHelper
    // TODO Add escape for every query params

    /** @table [string] [Model table name] **/
    protected $table;

    /** @primaryKey [string] [Model primary key] */
    protected $primaryKey;

    /** @columns array [Model set of properties] */
    protected $columns = [];

   /**
    * [__construct execute Database class constructor which make a connection from the DB]
    */
   public function __construct()
   {
        parent::__construct();
   }

   /**
    * [columns description]
    * @return [type] [description]
    */
   protected function columns() :array
   {
      return parent::columnsIn($this->table);
   }

   /**
    * [setModelProperties description]
    * @param array $fields [description]
    */
   private function setModelProperties(array $fields = [])
   {
        // Set a values for a model properties
        foreach ($fields as $property => $value) {
            $this->$property = $value;
        }
   }

   /**
    * [selectOnly description]
    * @param  int    $id      [description]
    * @param  array  $columns [description]
    * @return [type]          [description]
    */
   private function selectOnly(int $id , array $columns = ['*']) :string
   {
        $query = "SELECT " . implode(',',$columns) . " FROM {$this->table} WHERE id ='$id'";
        return $query;
   }

   /**
    * [select description]
    * @param  array  $columns [description]
    * @return [type]          [description]
    */
   private function select(array $columns = ['*']) :string
   {
        $query = "SELECT " . implode(',',$columns) . " FROM {$this->table}";
        return $query;
   }

   /**
    * [fetch description]
    * @param  string $where       [description]
    * @param  string $where_value [description]
    * @param  array  $columns     [description]
    * @return [type]              [description]
    */
   private function fetch(string $where, string $where_value, array $columns = ['*']) :string
   {
      $query = "SELECT " . implode(',',$columns) . " FROM {$this->table} 
                WHERE ".$where." = '".$where_value."' ";
      return $query;
   }

   /**
    * [insert description]
    * @param  array  $values [description]
    * @return [type]         [description]
    */
   private function insert(array $values = []) :string
   {
        // Function that will order the values by exact order of table columns
        // and also if the list has a value that not in table columns,
        // it will automatically remove.
        $values = QueryHelper::removeUnnecessaryColumns( 
                    QueryHelper::reOrderGivenFields($values, $this->columns)
            , $this->columns);

        // Prepare columns and values
        ['columns' => $columns, 'values' => $values] = QueryHelper::prepareQuery($values);

        $query =  "INSERT INTO {$this->table} (" . $columns . ") VALUES (" . $values . ")";

        return $query;
   }

   /**
    * [update description]
    * @return [type] [description]
    */
   private function update()
   {
      // Prefix for Update
        $query   = "UPDATE {$this->table} SET ";

      // Initilize column container
        $columns = null;
       
       // Prepare a SET statement
       foreach ($this->columns as $column) {
            $columns .=  $column . "='" .  $this->$column . "',";
       }

       // Build a Query
       $query = $query . rtrim($columns, ',') . " WHERE {$this->primaryKey} = '" . 
                $this->{$this->primaryKey} . "' LIMIT 1";

       return $query;
   }

   /**
    * [delete description]
    * @return [type] [description]
    */
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

   /**
    * [countData description]
    * @return [type] [description]
    */
   private function countData()
   {
        $query = "SELECT COUNT(id) as count FROM {$this->table}";
        return $query;
   }
  
  /**
   * [get description]
   * @param  array  $columns [description]
   * @return [type]          [description]
   */
  public function get(array $columns = ['*']) :array 
  {
        return $this->db->query($this->select($columns))
                        ->fetchAll(PDO::FETCH_OBJ);
  }
 
  /**
   * [where description]
   * @param  string $where       [description]
   * @param  string $where_value [description]
   * @param  array  $columns     [description]
   * @return [type]              [description]
   */
  public function where(string $where, string $where_value, array $columns = ['*'])
  {
      return $this->db->query($this->fetch($where,$where_value,$columns))
                      ->fetch(PDO::FETCH_OBJ);
  }

   /**
    * [create description]
    * @param  array  $values [description]
    * @return [type]         [description]
    */
   public function create(array $values = [])
   {
        $this->db->query($this->insert($values));
   }

   /**
    * [save description]
    * @return [type] [description]
    */
   public function save()
   {
       $this->db->query(parent::update());
   }

   /**
    * [find description]
    * @param  int    $id      [description]
    * @param  array  $columns [description]
    * @return [type]          [description]
    */
   public function find(int $id , array $columns = ['*']) :object 
   {
        $result = $this->db->query($this->selectOnly($id, $columns))
                           ->fetch(PDO::FETCH_OBJ);
        
        $this->setModelProperties( (array) $result);

        return $this;
   }

   /**
    * [destroy description]
    * @return [type] [description]
    */
   public function destroy()
   {
        return $this->db->query($this->delete());
   }

   /**
    * [count description]
    * @return [type] [description]
    */
   public function count()
   {
      return $this->db->query($this->countData())
                  ->fetch(PDO::FETCH_OBJ);
   }
    
}

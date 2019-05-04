<?php
namespace App\Core;

use App\Helpers\Database\QueryHelper;
use App\Helpers\Str;
use PDO;

class QueryBuilder extends Database
{
    protected static $table;
    protected $query;

    public static function table(string $table)
    {
        self::$table = $table;
        return new static;
    }

     public function join()
    {

       if ( !func_get_arg(0)  ) {
            // Throw an exception
       }

       $table   = func_get_arg(0);

       $clauses = implode(' ', func_get_args());

       $this->query[] = QueryHelper::prepareJoin(' INNER JOIN ',$table , $clauses);

        return $this;
    }

    public function leftJoin()
    {
        $table = func_get_arg(0);
        
        $clauses = implode(' ' , func_get_args());
        
        $this->query[] = QueryHelper::prepareJoin(' LEFT JOIN ' , $table , $clauses);

        return $this;
    }

    public function rightJoin()
    {
        $table = func_get_arg(0);

        $clauses = implode(' ', func_get_args());

        $this->query[] = QueryHelper::prepareJoin(' RIGHT JOIN ' , $table , $clauses);
        return $this;
    }

    public function select()
    {
        $columns = func_get_args();

        $table = self::$table;

        $this->query[] =  "SELECT " . implode(', ', $columns)
                          . " FROM {$table}";
        return $this;
    }

    public function orWhere(string $column, string $value)
    {
        $this->query[] = " OR WHERE {$column} = '${value}'";
        return $this;
    }

    public function where($column , $value = null)
    {
        if ( is_array($column) ) {
            $values = QueryHelper::prepareWhereValues($column);
            $this->query[] = " WHERE $values ";
        } else {
            $this->query[] = " WHERE {$column} = '${value}'";    
        }

        return $this;
    }

    public function get()
    {
        
        $joins  = $select = $where = null;

        foreach ($this->query as $key => $query) {

            if ( QueryHelper::queryHasWhere($query) ) {
                $where = $query;
            } else if ( QueryHelper::queryHasSelect($query) ) {
                $select = $query;        
            } else if ( QueryHelper::queryHasJoin($query) ) {
                $joins .= $query;
            }

        }

        return $this->db->query($select  . $joins . " " . $where)->fetchAll(PDO::FETCH_ASSOC);
    }


}

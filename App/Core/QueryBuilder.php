<?php
/**
* The letters in each queries is important
* to easily sort the statement
*/
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
       $this->query['b'][] = QueryHelper::prepareJoin(' INNER JOIN ', $table, $clauses);

        return $this;
    }

    public function leftJoin()
    {
        $table = func_get_arg(0);
        
        $clauses = implode(' ' , func_get_args());
        
        $this->query['b'][] = QueryHelper::prepareJoin(' LEFT JOIN ' , $table , $clauses);

        return $this;
    }

    public function rightJoin()
    {
        $table = func_get_arg(0);

        $clauses = implode(' ', func_get_args());

        $this->query['b'][] = QueryHelper::prepareJoin(' RIGHT JOIN ' , $table , $clauses);
        return $this;
    }

    public function select()
    {
        $columns = func_get_args();

        $table = self::$table;

        $this->query['a'][] =  " SELECT " . implode(', ', $columns)
                          . " FROM {$table}";
        return $this;
    }

    public function orWhere(string $column, string $operation = '=' ,string $value)
    {
        $this->query['c'][] = " OR WHERE {$column} {$operation} '${value}'";
        return $this;
    }

    public function where(string $column, string $operation,  string $value)
    {
        $this->query['c'][] = " WHERE {$column} ${operation} '${value}'";
        return $this;
    }

    public function andWhere(string $column, string $operation,  string $value)
    {
        $this->query['c'][] = "AND WHERE {$column} ${operation} '${value}'";
        return $this;
    }

    public function limit(int $no)
    {
        $this->query['e'][] = "LIMIT ${no}";
        return $this;
    }

    public function orderBy(string $column , string $value = 'DESC')
    {
        $this->query['d'][] = "ORDER BY {$column} ${value}";
        return $this;
    }

    public function get()
    {
        $statement = QueryHelper::prepareQueryStatements($this->query);
        return $this->db->query($statement)->fetchAll(PDO::FETCH_ASSOC);
    }


}

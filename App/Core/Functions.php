<?php
namespace App\Core;
trait Functions
{
    private $input = [];

    public function is_post() : bool
    {
        return $_SERVER['REQUEST_METHOD'] === 'POST';
    }

    public function escape(array $data)
    {
        array_walk($data,function($user_input,$keys){
            $this->input[$keys] = htmlspecialchars($user_input);
        });
       return $this->input;
    }

    protected function lastElementKeyAndvalue(array $array_items)
    {
        end($array_items);
        $key = key($array_items);
        $value = end($array_items);
        return ['where_clause' => $key  , 'where_clause_value' => $value];
    }

    public function flatten(array $data)
    {
        $list = [];
        foreach ($data as $keys => $value) {
            $keys = trim($keys);
            if (is_array($value)) {
                foreach ($value as $key => $values) {
                    $list[$values] = $values;
                }
            }else{
                $list[$keys] = $value;
            }
        }
        return $list;
    }
}
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

    public function set_password_hash($password)
    {
        return password_hash($password,PASSWORD_DEFAULT);
    }

    public function is_user(array $data = null)
    {
        return password_verify($data['input_password'],$data['password_from_db']);
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

    public static function before_every_protected_page(){
        if (!isset($_SESSION['id'])) {
            header("Location:/system/page/index");
        }
    }

    public static function after_login()
    {
         if (isset($_SESSION['id'])) {
            header("Location:/system/admin/dashboard");
        }
    }

    public function calculateEquivalent($value , $compare = [])
    {
        if ($value > $compare[0]) {
                return "Above Average";
        }   else if ($value < $compare[1]){
                return "Below Average";
        }   else{
                return "Average";
        }
    }
}
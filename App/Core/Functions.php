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




    public static function end_session(){
        session_destroy();
        session_unset();
    }

    public static function request_ip_matches_session(){
        if(!isset($_SESSION['ip']) || !isset($_SERVER['REMOTE_ADDR'])){
            return false;
        }

        if($_SESSION['ip'] === $_SERVER['REMOTE_ADDR']){
            return true;
        }else{
            return false;
        }
    }

    public static function request_user_agent_matches_session(){
        if(!isset($_SESSION['user_agent']) || !isset($_SERVER['HTTP_USER_AGENT'])){
            return false;
        }

        if($_SESSION['user_agent'] === $_SERVER['HTTP_USER_AGENT']){
            return true;
        }else{
            return false;
        }

    }

    public static function last_login_is_recent(){
        $max_elapsed = 60 * 60 * 24;

        if(!isset($_SESSION['last_login'])){
            return false;
        }

        if(($_SESSION['last_login'] + $max_elapsed) >= time()){
            return true;
        }else{
            return false;
        }
    }

    public static function is_session_valid(){
        $check_ip = true;
        $check_user_agent = true;
        $check_last_login = true;

        if($check_ip && !self::request_ip_matches_session()) {
            return false;
        }
        if($check_user_agent && !self::request_user_agent_matches_session()) {
            return false;
        }
        if($check_last_login && !self::last_login_is_recent()) {
            return false;
        }
        return true;
    }

    public static function confirm_session_is_valid() {
        if(!self::is_session_valid()) {
            end_session();
            header("/system/page/index");
            exit;
        }
    }

    public static function is_logged_in() {
    return (isset($_SESSION['logged_in']) && $_SESSION['logged_in']);
    }


    public static function confirm_user_logged_in() {
    if(!self::is_logged_in()) {
        self::end_session();
        header("/system/page/index");
        exit;
        }
    }

    public static function after_successful_login() {
        session_regenerate_id();
        $_SESSION['logged_in'] = true;
        $_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
        $_SESSION['user_agent'] = $_SERVER['HTTP_USER_AGENT'];
        $_SESSION['last_login'] = time();

    }

    public static function after_successful_logout(){
        $_SESSION['logged_in'] = false;
        self::end_session();
    }

    public static function before_every_protected_page(){
        self::confirm_user_logged_in();
        self::confirm_session_is_valid();
    }

}
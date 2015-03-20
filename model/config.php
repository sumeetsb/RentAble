<?php

$deploy = false;

if ($deploy){
    define('ROOT', 'http://rentable.sumeetb.com/');
} else {
    define('ROOT', 'http://localhost/rentable/');
}

$cssArray = array();

session_start();

class config{
    public static $username = "";
    public static $id = "";
    
    public static function reset(){
        self::$username = "";
        self::$id = "";
    }
}
<?php
class Db_connect {
    private static $dns = "mysql:host=localhost;dbname=Forum";
    private static $user = "root";
    private static $pass = "";
    private static $db;
    
    private function __construct(){}
    
    public static function getDB(){
        if (!isset(self::$db)){
            try{
                self::$db = new PDO(self::$dns, self::$user, self::$pass);
            } catch (PDOException $ex) {
                echo $ex->getMessage();
                exit();
            }
        }
        return self::$db;
    }
}

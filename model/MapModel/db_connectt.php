<?php
class Db_connectt {
    private static $dns = "mysql:host=www.sumeetb.com;dbname=RentAble";
    private static $user = "rentable";
    private static $pass = "crazypass!!";
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
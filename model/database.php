<?php
class Database {
	
    private static $dsn = "mysql:host=localhost;dbname=Rentable";
    private static $username = "root";
    private static $password = "root";
   //reference to db connection
    private static $dbcon;

    
    private function __construct() {}

    //return reference to pdo object
    public static function getDB () {
    	
        if (!isset(self::$dbcon)) {
            try {
                self::$dbcon = new PDO(self::$dsn,
                                     self::$username,
                                     self::$password);
            } catch (PDOException $e) {
                $error_message = $e->getMessage();
                include('../Error/databaseerror.php');
                exit();
            }
        }
        return self::$dbcon;
    }
}
?>
<?php
include ('db_connect.php');
include ('user.php');

class UsersClass {
    
    public static function getUser($user, $pass){
        $db = Db_connect::getDB();
        $q = "SELECT * FROM users WHERE user_name = :user AND password = :pass";
        $stm = $db->prepare($q);
        $stm->bindParam(":user", $user);
        $stm->bindParam(":pass", $pass);
        $stm->setFetchMode(PDO::FETCH_ASSOC);
        $stm->execute();
        $result = $stm->fetchAll();
        if(count($result) == 1){
            foreach ($result as $u){
                $person = new User($u["first_name"], $u["last_name"], $u["user_name"], $u["password"], $u["email"], $u["phone"], $u["role"], $u["age"]);
                $person->setId($u["id"]);
            }
            return $person;
        } else {
            return null;
        }
    }
    
    public static function makeUser($user){
        $db = Db_connect::getDB();
    }
    
}
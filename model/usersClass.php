<?php
require_once('db_connect.php');
require_once('user.php');

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
    
    public static function makeUser(User $user){
        $db = Db_connect::getDB();
        $fname = $user->getFname();
        $lname = $user->getLname();
        $uname = $user->getUname();
        $email = $user->getEmail();
        $pass = $user->getPword();
        $age = $user->getAge();
        $phone = $user->getPhone();
        $role = $user->getRole();
        $q = "INSERT INTO users (first_name, last_name, user_name, password, email, phone, role, age) "
                . "VALUES('$fname', '$lname', '$uname', '$pass', '$email', '$phone', '$role', $age)";
        $stm = $db->prepare($q);
        $stm->execute();
    }
    
    public static function getPropertiesOfTenant($tenant_id){
        $db = Db_connect::getDB();
        $q = "SELECT p_id FROM tenants WHERE tenant_id = :id";
        $stm = $db->prepare($q);
        $stm->bindParam(":id", $tenant_id);
        $stm->setFetchMode(PDO::FETCH_ASSOC);
        $stm->execute();
        $props = $stm->fetchAll();
        $pArray = array();
        if(count($props)> 0){
            foreach($props as $prop){
                $pArray[] = $prop['p_id'];
            }
        }
        
        return $pArray;
    }
    
}
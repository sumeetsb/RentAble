<?php
//Sumeet Bhullar
require_once('db_connect.php');
require_once('user.php');
require_once('adminUser.php');

class UsersClass {
    
    public static function getUserById($id){
        $db = Db_connect::getDB();
        $q = "SELECT * FROM users where id = :id";
        $stm = $db->prepare($q);
        $stm->bindParam(":id", $id);
        $stm->execute();
        $u = $stm->fetch();
        if ($u != null){
            $user = new User($u["first_name"], $u["last_name"], $u["user_name"], $u["password"], $u["email"], $u["phone"], $u["role"], $u["age"]);
        } else {
            $user = null;
        }
        return $user;
    }
    
    //Method to obtain user for login
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
    
    //Method to make new user for users table
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
    
    //Method to obtain current residences of user if tenant
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
    
    //Method to obtain all property ids of user if landlord
    public static function getPropertyIDsofLandlord($landlord_id){
        $db = Db_connect::getDB();
        $q = "SELECT id FROM properties WHERE landlord_id = :id";
        $stm = $db->prepare($q);
        $stm->bindParam(":id", $landlord_id);
        $stm->setFetchMode(PDO::FETCH_ASSOC);
        $stm->execute();
        $props = $stm->fetchAll();
        $pArray = array();
        if(count($props) > 0){
            foreach($props as $prop){
                $pArray[] = $prop['id'];
            }
        }
        return $pArray;
    }
    
    public static function getAdmin($user, $pass){
        $db = Db_connect::getDB();
        $q = "SELECT * FROM admins WHERE username = '$user' AND password = '$pass'";
        $stm = $db->prepare($q);
        $stm->setFetchMode(PDO::FETCH_ASSOC);
        $stm->execute();
        $result = $stm->fetchAll();
        if(count($result) == 1){
            $admin = new adminUser($result[0]['username'], $result[0]['password']);
            return $admin;
        } else {
            return null;
        }
    }
    
}
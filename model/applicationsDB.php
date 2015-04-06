<?php
//Craig Veenstra
//Tenant Application Feature


require_once 'db_connect.php';
require "../TenantApplication/insert.php";
require "user.php";

////////////////////////////////////////////////////////////////////////////////////
/////////   this class gets all Tenant Applications from the database     //////////
////////////////////////////////////////////////////////////////////////////////////

class Applications {
    
    public static function getApplications(){
        
        //connect to the database
        $db = Db_connect::getDB();
        
        //the sql statement in a variable
        $SQL = 'SELECT * FROM Applications';
        
        //returning the results from the query into $getApplications
        $getApplications = $db->query($SQL);
        return $getApplications;    
    }   
}





////////////////////////////////////////////////////////////////////////////////////
/////////       this class inserts into the database              //////////////////
////////////////////////////////////////////////////////////////////////////////////

class ApplicationDB {
    public static function insertApplications($tenantObject){
        
        //connect to the database
        $db = Db_connect::getDB();

        $property = $tenantObject->getproperty_id();
        $user = $tenantObject->getuser_id();
        $message = $tenantObject->getmessage();
     
        //the sql statement variable
        $SQL = "INSERT INTO applications (p_id, u_id, message) VALUES ($property, $user, '$message')";
        
        //stm is a variable passing the the prepared sql query into the database
        $stm = $db->prepare($SQL);
        
        //putting the values into the database
        $row_count = $stm->execute();
 
    }
}

///////////////////////////////////////////////////////////////////////////////////////////////////////
/////////       this gets all the tenant applciatins for a specific property         //////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////

class getTenantApplications {
    public static function getTenantApps($p_id){
        $db = Db_connect::getDB();
        $SQL = "SELECT * FROM applications WHERE p_id = $p_id";
        $propertyApplications = $db->query($SQL);
        $applicationArray = array();
        foreach($propertyApplications as $row){
            $appObjects = new Tenant($row['u_id'], $row['p_id'], $row['message']); 
            $applicationArray[] = $appObjects;        
        } 
        return $applicationArray;
    }
}




///////////////////////////////////////////////////////////////////////////////////////////////////////
/////////      getting the tenant information for the tenant application lsit        //////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////

class getUserInfo {
    public static function getInfo($p_id){
        $db = Db_connect::getDB();
        $SQL = "SELECT * FROM users u JOIN applications a ON u.id = a.id WHERE u.id = $p_id AND a.id = $p_id";
        $fetchUserInfo = $db->query($SQL);
        $userArray = array();
        foreach($fetchUserInfo as $row){
            $userObject = new User($row['first_name'], $row['last_name'], $row['user_name'], $row['password'], $row['email'], $row['phone'], $row['role'], $row['age'], $row['gender'], $row['smoker']);
            $userArray[] = $userObject;
            
        }
        return $userArray;
    }
}


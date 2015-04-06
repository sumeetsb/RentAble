<?php
//Craig Veenstra
//Tenant Application Feature


require_once 'db_connect.php';
require_once "../TenantApplication/insert.php";
require_once "user.php";

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
            $appObjects = new Tenant($row['id'], $row['u_id'], $row['p_id'], $row['message']); 
            $applicationArray[] = $appObjects;        
        } 
        return $applicationArray;
    }
}




///////////////////////////////////////////////////////////////////////////////////////////////////////
/////////      getting the tenant information for the tenant application lsit        //////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////

class getUserInfo {
    public static function getInfo($u_id){
        $db = Db_connect::getDB();
        $SQL = "SELECT * FROM users WHERE id = $u_id ";
        $UserInfo = $db->query($SQL);
        $row = $UserInfo->fetch();
        $userObject = new User($row['first_name'], $row['last_name'], $row['user_name'], $row['password'], $row['email'], $row['phone'], $row['role'], $row['age'], $row['gender'], $row['smoker']);
         
        return $userObject;
    }
}


///////////////////////////////////////////////////////////////////////////////////////////////////////
/////////      deleting the application to be a tenant        /////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////

class deleteApplicant {
    public static function delete($appid){
        $db = Db_connect::getDB();
        $SQL = "DELETE FROM applications WHERE id = $appid";
        $db->query($SQL);
    }
}



///////////////////////////////////////////////////////////////////////////////////////////////////////
/////////       this gets a specific application to a property        /////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////

class getTenantApplication {
    public static function getApplication($appid){
        $db = Db_connect::getDB();
        $SQL = "SELECT * FROM applications WHERE id = $appid";
        $Application = $db->query($SQL);
        $row = $Application->fetch();
        $appObjects = new Tenant($row['id'], $row['u_id'], $row['p_id'], $row['message']); 
        return $appObjects;       
        
    }
}


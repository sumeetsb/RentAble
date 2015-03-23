<?php
//Craig Veenstra
//Tenant Application Feature


require_once 'db_connect.php';


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
        
        //un packing the object sent into the static method
        $endDate = $subletObject->getendDate();

        //the sql statement variable
        $SQL = "INSERT INTO applications (p_id, u_id, message) VALUES ($u_id, $p_id, '$description', $rentAmount, '$startDate', '$endDate')";
        
        //stm is a variable passing the the prepared sql query into the database
        $stm = $db->prepare($SQL);
        
        //putting the values into the database
        $row_count = $stm->execute();
 
    }
}


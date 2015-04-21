<?php
//Craig Veenstra
require_once('../Sublet/apply.php');
require_once 'db_connect.php';
require_once '../Sublet/insert.php';

////////////////////////////////////////////////////////////////////////////////////
/////////       Interacting with the Sublets table              ////////////////////
////////////////////////////////////////////////////////////////////////////////////

class SubletDB {
    
    ///////////////////////////////////////////////////
    /// Inserting into the subletApplication Table  ///
    ///////////////////////////////////////////////////
    
    public static function insertApplication(Apply $applyObject){
        
        //connect to the database
        $db = Db_connect::getDB();
        
        //un packing the object sent into the static method
        $u_id = $applyObject->getu_id();
        $p_id = $applyObject->getp_id();
        $message = $applyObject->getmessage();
        $email = $applyObject->getemail();
        

        //the sql statement variable
        $SQL = "INSERT INTO subletapplications (p_id, u_id, message, email) VALUES ($p_id, $u_id, '$message', '$email')";
        
        //stm is a variable passing the the prepared sql query into the database
        $stm = $db->prepare($SQL);
        
        //putting the values into the database
        $row_count = $stm->execute();
 
    }
    
    
    
    
    /////////////////////////////////////////////////////////////////
    /// Getting all the applications to a sublet on a property    ///
    /////////////////////////////////////////////////////////////////
    
    
    public static function deleteApplication($uid, $pid){
        $db = Db_connect::getDB();
        $SQL = "DELETE FROM subletapplications WHERE u_id = $uid AND p_id = $pid";
        $db->query($SQL);      
    }
    
    
    
    
    /////////////////////////////////////////////////////////////////
    /// Getting all the applications to a sublet on a property    ///
    /////////////////////////////////////////////////////////////////
    
        public static function getApplications($pid){
            
            $db = Db_connect::getDB();
            
            $SQL = "SELECT * FROM subletapplications WHERE p_id = $pid";
            
            $getApplications = $db->query($SQL);
            
            $applications = array();
            
            foreach ($getApplications as $row){
            $application = new Apply($row['p_id'], $row['u_id'], $row['message'], $row['email']);
            $applications[] = $application; 
            }
            
            return $applications;
        }
    
    /////////////////////////////////////////////////////////////////
                    /// Getting 1 application    ///
    /////////////////////////////////////////////////////////////////
    
    public static function getApplication($pid, $uid){
        $db = Db_connect::getDB();
        $SQL = "SELECT * FROM subletapplications WHERE p_id = $pid AND u_id = $uid";
        $getApplication = $db->query($SQL);
        foreach ($getApplication as $row){
            $application = new Apply($row['p_id'], $row['u_id'], $row['message'], $row['email']);
             
            }
        return $application;
    }
    
    
    //////////////////////////////////////////
    /// Inserting into the Sublet Table    ///
    //////////////////////////////////////////
    
    public static function insertSublets($subletObject){
        
        //connect to the database
        $db = Db_connect::getDB();
        
        //un packing the object sent into the static method
        $u_id = $subletObject->getu_id();
        $p_id = $subletObject->getp_id();
        $description = $subletObject->getDescription();
        $rentAmount = $subletObject->getrentAmount();
        $startDate = $subletObject->getstartDate();
        $endDate = $subletObject->getendDate();
        
        $startDate = DateTime::createFromFormat('m/d/Y', $startDate)->format('Y-m-d');
        $endDate = DateTime::createFromFormat('m/d/Y', $endDate)->format('Y-m-d');

        //the sql statement variable
        $SQL = "INSERT INTO sublets (u_id, p_id, info, rentAmount, startDate, endDate) VALUES ($u_id, $p_id, '$description', $rentAmount, '$startDate', '$endDate')";
        
        //stm is a variable passing the the prepared sql query into the database
        $stm = $db->prepare($SQL);
        
        //putting the values into the database
        $row_count = $stm->execute();
 
    }
    
    
    
    //////////////////////////////////////////
    /// Getting sublet by id from the table ///
    //////////////////////////////////////////
    
    public static function getSubletbyID($id){
        
        //connect to the database
        $db = Db_connect::getDB();
        
        //the sql statement in a variable
        $SQL = 'SELECT * FROM Sublets WHERE u_id = ' . $id;
    
        //stm stands for statement
        $stm = $db->prepare($SQL);
        $stm->execute();
        
        $row = $stm->fetch(PDO::FETCH_ASSOC); 
        
        return $row;    
        
    }   
    
    
    ////////////////////////////////////////////////////
    /// Getting all sublets from the unique property ///
    ////////////////////////////////////////////////////
    
    public static function getpropertySublets($p_id){
        
        //connect to the database
        $db = Db_connect::getDB();
        
        //the sql statement in a variable
        $SQL = "SELECT * FROM Sublets WHERE p_id = $p_id";
        
        //returning the results from the query into $getSublets
        $getSublets = $db->query($SQL);
        $sublets = array();
        foreach ($getSublets as $row){
            $sublet = new Sublet($row['u_id'], $row['p_id'], $row['info'], $row['rentAmount'], $row['startDate'], $row['endDate']);
            $sublets[] = $sublet;
        }
        return $sublets;    
    }  
   
    
    
    
    //////////////////////////////////////////
    /// Deleting sublets from the table //////
    //////////////////////////////////////////
    
    public static function deleteSublet(Sublet $subletObject){
        
        //connect to the database
        $db = Db_connect::getDB();
        
         //un packing the object sent into the static method
        $u_id = $subletObject->getu_id();
        $p_id = $subletObject->getp_id();
        
        //the sql statement in a variable
        $SQL = "DELETE FROM Sublets WHERE p_id = $p_id AND u_id = $u_id";
        
        $db->query($SQL);        
    }
    
    
    //////////////////////////////////////////
    /// Updating sublets from the table /////
    //////////////////////////////////////////
    
    public static function updateSublet(Sublet $subletObject){
        
        //connect to the database
        $db = Db_connect::getDB();
        
        //un packing the object sent into the static method
        $u_id = $subletObject->getu_id();
        $p_id = $subletObject->getp_id();
        $description = $subletObject->getDescription();
        $rentAmount = $subletObject->getrentAmount();
        $startDate = $subletObject->getstartDate();
        $endDate = $subletObject->getendDate();
        //the sql statement in a variable
        $SQL = "UPDATE Sublets SET info = '$description', rentAmount = '$rentAmount', startDate = '$startDate', endDate = '$endDate' WHERE p_id = $p_id AND u_id = $u_id";
            
        //stm stands for statement
        $stm = $db->prepare($SQL);
        $row_count = $stm->execute();
        
        return $row_count;
    }
}


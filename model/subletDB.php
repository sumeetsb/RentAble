<?php
//Craig Veenstra

require_once 'db_connect.php';
require_once '../Sublet/insert.php';

////////////////////////////////////////////////////////////////////////////////////
/////////       Interacting with the Sublets table              ////////////////////
////////////////////////////////////////////////////////////////////////////////////

class SubletDB {
    
    
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
    /// Getting all sublets from the table ///
    //////////////////////////////////////////
    
    public static function getSublets(){
        
        //connect to the database
        $db = Db_connect::getDB();
        
        //the sql statement in a variable
        $SQL = 'SELECT * FROM Sublets s JOIN Properties p ON s.p_id=p.p_id';
        
        //returning the results from the query into $getSublets
        $getSublets = $db->query($SQL);
        return $getSublets;    
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


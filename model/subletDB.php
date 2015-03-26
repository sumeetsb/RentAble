<?php
//Craig Veenstra

require_once 'db_connect.php';

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
    /// Getting all sublets from the table ///
    //////////////////////////////////////////
    
    public static function getSublets(){
        
        //connect to the database
        $db = Db_connect::getDB();
        
        //the sql statement in a variable
        $SQL = 'SELECT * FROM Sublets';
        
        //returning the results from the query into $getSublets
        $getSublets = $db->query($SQL);
        return $getSublets;    
    }   
    
    
    
    //////////////////////////////////////////
    /// Deleting sublets from the table //////
    //////////////////////////////////////////
    
    public static function deleteSublet($p_id, $u_id){
        
        //connect to the database
        $db = Db_connect::getDB();
        
        //the sql statement in a variable
        $SQL = 'DELETE FROM Sublets WHERE p_id =' . $p_id . ' AND u_id =' . $u_id;
        
        $deleteSublets = $db->query($SQL);
        return $deleteSublets;   
    }
    
    
    //////////////////////////////////////////
    /// Updateing sublets from the table /////
    //////////////////////////////////////////
    
    public static function updateSublet($subletObject){
        
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
        $SQL = 'UPDATE Sublets SET info = ' . $description . ', rentAmount = ' . $rentAmount . ', startDate = ' . $startDate . ', endDate = '. $endDate . ' WHERE p_id = ' . $p_id . ' AND u_id = ' . $u_id;
               
        $updateSublets = $db->query($SQL);
        return $updateSublets;
    }
}


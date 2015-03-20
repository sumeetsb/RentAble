<?php
//Craig Veenstra


////////////////////////////////////////////////////////////////////////////////////
/////////       this class gets all sublets from database         //////////////////
////////////////////////////////////////////////////////////////////////////////////

class Sublets {
    
    public static function getSublets(){
        
        //connect to the database
        $db = Database::getDB();
        
        //the sql statement in a variable
        $SQL = 'SELECT * FROM Sublets';
        
        //returning the results from the query into $getSublets
        $getSublets = $db->query($SQL);
        return $getSublets;    
    }   
}





////////////////////////////////////////////////////////////////////////////////////
/////////       this class inserts into the database              //////////////////
////////////////////////////////////////////////////////////////////////////////////

class SubletDB {
    public static function insertSublets($subletObject){
        
        //connect to the database
        $db = Database::getDB();
        
        //un packing the object sent into the static method
        $u_id = $subletObject->getu_id();
        $p_id = $subletObject->getp_id();
        $description = $subletObject->getDescription();
        $rentAmount = $subletObject->getrentAmount();
        $startDate = $subletObject->getstartDate();
        $endDate = $subletObject->getendDate();
        
        
        
        //the sql statement variable
        $SQL = "INSERT INTO sublets (u_id, p_id, info, roomAmount, startDate, endDate) VALUES ($u_id, $p_id, '$description', $roomAmount, '$startDate', '$endDate')";
        
        //stm is a variable passing the the prepared sql query into the database
        $stm = $db->prepare($SQL);
        
        $row_count = $stm->execute();
        
        //returning the results from the query into db
        return $row_count;
 
    }
}

SubletDB::insertSublets('My descirption', '34', '2015-04-04', '2015-05-15');

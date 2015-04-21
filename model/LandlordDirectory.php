<?php
//Craig Veenstra

require_once 'db_connect.php';
require_once 'user.php';

class LandlordDirectory {
    public static function searchLandlord($search){
        $db = Db_connect::getDB();
        
        $SQL = "SELECT * FROM users WHERE role = 'landlord' AND (first_name LIKE '%$search%' OR last_name LIKE '%$search%' OR concat(first_name, ' ', last_name) LIKE '%$search%')";
        
        //stm is a variable passing the the prepared sql query into the database
        $stm = $db->prepare($SQL);
        
        //putting the values into the database
        $stm->execute();
        
        $result = $stm->fetchAll();
        
        $landlordArray = array();
        
        foreach ($result as $row){
            $landlords = new User($row['first_name'], $row['last_name'], $row['user_name'], $row['password'], $row['email'], $row['phone'], $row['role'], $row['age']);
            $landlordArray[] = $landlords;
            }       
        
        return $landlordArray;
                
    }
}


<?php
require_once('db_connect.php');
require_once('property.php');

class PropertiesClass {
    
    public static function getPropertiesByLandlord($landlord_id){
        $db = Db_connect::getDB();
    }
    
    public static function getPropertyById($p_id){
        $db = Db_connect::getDB();
        $q = "SELECT * FROM properties WHERE id = $p_id";
        $stm = $db->prepare($q);
        $stm->setFetchMode(PDO::FETCH_ASSOC);
        $stm->execute();
        $results = $stm->fetchAll();
        if(count($results) == 1){
            $result = $results[0];
            $property = new Property($result['landlord_id'], $result['name'], $result['street'], $result['postal_code'], $result['city'], $result['province'], $result['latitude'], $result['longitude'], $result['type']);
            return $property;
        } else {
            return null;
        }
    }
    
    
}


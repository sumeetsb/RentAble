<?php
require_once('db_connect.php');
require_once('property.php');

class PropertiesClass {
    
    public static function getPropertiesByLandlord($landlord_id){
        $db = Db_connect::getDB();
        $q = "SELECT * FROM properties WHERE landlord_id = :id";
        $stm = $db->prepare($q);
        $stm->bindParam(":id", $landlord_id);
        $stm->setFetchMode(PDO::FETCH_ASSOC);
        $stm->execute();
        $results = $stm->fetchAll();
        $props = array();
        foreach ($results as $row){
            $prop = new Property();
            $props[] = $prop;
        }
        return $props;
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
    
    public static function updateProperty(Property $property){
        $db = Db_connect::getDB();
        $l_id = $property->getLandLordId();
        $name = $property->getName();
        $street = $property->getStreet();
        $postal_code = $property->getPostal();
        $city = $property->getCity();
        $province = $property->getProvince();
        $latitude = $property->getLatitude();
        $longitude = $property->getLongitude();
        $type = $property->getType();
        $q = "UPDATE properties SET name = '$name', street = '$street', postal_code = '$postal_code', city = '$city', latitude = $latitude, longitude = $longitude, type = '$type'";
        
    }
    
    public static function registerProperty(Property $property){
        $db= Db_connect::getDB();
        $l_id = $property->getLandLordId();
        $name = $property->getName();
        $street = $property->getStreet();
        $postal_code = $property->getPostal();
        $city = $property->getCity();
        $province = $property->getProvince();
        $latitude = $property->getLatitude();
        $longitude = $property->getLongitude();
        $type = $property->getType();
        $q = "INSERT INTO properties (landlord_id, name, street, postal_code, city, province, latitude, longitude, type) VALUES($l_id, '$name', '$street', '$postal_code', '$city', '$province', '$latitude', '$longitude', '$type')";
        try{
            $stm = $db->prepare($q);
            $stm->execute();
        } catch (PDOException $ex) {
            $error = $ex->getMessage();
        }
        
    }   
}


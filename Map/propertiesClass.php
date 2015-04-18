<?php
require_once ('../model/config.php');
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
    
//Map Markers
     public static function deleteMarker($marker_id) {
        $dbcon = Db_connect::getDB();
        $query = "DELETE FROM properties
                  WHERE ID = '$marker_id'";
        $row_count = $dbcon->exec($query);
        return $row_count;
    }
    
     public static function addMarker($marker) {
        $dbcon = Db_connect::getDB();
        $l_id = $marker->getLandLordId();
        $name = $marker->getName();
        $street = $marker->getStreet();
        $postal = $marker->getPostal();
        $city = $marker->getCity();
        $province = $marker->getProvince();       
        $lat = $marker->getLatitude();
        $lng = $marker->getLongitude();
        $type = $marker->getType();
        $query =
            "INSERT INTO properties
                 (landlord_id, name, street, postal_code, city, province, latitude, longitude, type)
             VALUES
                 ( '$l_id', '$name', '$street', '$postal', '$city', '$province', '$lat', '$lng','$type')";
        $row_count = $dbcon->exec($query);
        return $row_count;
    }
       
     public static function getMarkers() {
        $dbcon = Db_connect::getDB();
        $query = "SELECT * FROM properties";
        $result = $dbcon->query($query);
        $result->setFetchMode(PDO::FETCH_OBJ);
        return $result;
    }
    
    public static function getMarker($marker_id) {
        $dbcon = Db_connect::getDB();
        $query = "SELECT * FROM properties
                  WHERE ID = '$marker_id'";
        $result = $dbcon->query($query);
        $result->setFetchMode(PDO::FETCH_OBJ);
        return $result;
    }    
    
    public static function updateMarker($marker, $marker_id) {
        $dbcon = Db_connect::getDB();
        $l_id = $marker->getLandLordId();
        $name = $marker->getName();
        $street = $marker->getStreet();
        $postal = $marker->getPostal();
        $city = $marker->getCity();
        $province = $marker->getProvince();       
        $lat = $marker->getLatitude();
        $lng = $marker->getLongitude();
        $type = $marker->getType();
        $query =
            "UPDATE properties
             SET  landlord_id='".$l_id."', name='".$name."', street='".$street."',postal_code='".$postal."',city='".$city."', province='".$province."',latitude='".$lat."',longitude='".$lng."',type='".$type."' WHERE id='".$marker_id."' ";
        $row_count = $dbcon->exec($query);
        return $row_count;
    }
    
    
}


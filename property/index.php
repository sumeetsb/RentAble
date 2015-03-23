<?php
require_once('../model/config.php');
require_once('../model/property.php');
require_once('../model/propertiesClass.php');

if(isset($_SESSION['role']) && isset($_GET['propid'])){
    $properties = $_SESSION['props'];
    $propid = $_GET['propid'];
    if(in_array($propid, $properties)){
        
        $property = PropertiesClass::getPropertyById($propid);
        $p_name = $property->getName();
        $p_street = $property->getStreet();
        $p_postal = $property->getPostal();
        $p_city = $property->getCity();
        $p_province = $property ->getProvince();
        $p_lat = $property->getLatitude();
        $p_long = $property->getLongitude();
        $p_type = $property->getType();
        
        include('propertyPage.php');
        
    } else {
        header("Location: ../index.php");
    }
} else {
    header("Location: ../index.php");
}

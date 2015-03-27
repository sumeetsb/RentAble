<?php
require_once('../model/config.php');
require_once('../model/property.php');
require_once('../model/propertiesClass.php');
require_once('../model/subletDB.php');

///IF user logged in and propid GET variable exists AND propid is a property that user is a part of then
// show property details
//
///ELSE return to home page

if(isset($_SESSION['role']) && isset($_GET['propid'])){
    $properties = $_SESSION['props'];
    $propid = $_GET['propid'];
    if(in_array($propid, $properties)){
        ///Grab property from database and unpack details
        $property = PropertiesClass::getPropertyById($propid);
        $p_name = $property->getName();
        $p_street = $property->getStreet();
        $p_postal = $property->getPostal();
        $p_city = $property->getCity();
        $p_province = $property ->getProvince();
        $p_lat = $property->getLatitude();
        $p_long = $property->getLongitude();
        $p_type = $property->getType();
        
        
        //unpacking the sublets
        $getSublets = subletDB::getpropertySublets($p_id);
        $description = $getSublets->getinfo();
        $rentAmount = $getSublets->getrentAmount();
        $startDate = $getSublets->getstartDate();
        $endDate = $getSublets->getendDate();
        
        include('propertyPage.php');
        
    } else {
        header("Location: ../index.php");
    }
} else {
    header("Location: ../index.php");
}

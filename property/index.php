<?php
require_once('../model/config.php');

function classloader($class) {
    $classStr = '../model/' . strtolower($class) . '.php';
    require_once $classStr;
}

spl_autoload_register('classloader');

//IF user is logged in landlord and wants to GET var 'manage_propid' exists then show property management page
//ELSE IF user is logged in as landlord and POST var 'update' exists then validate and update property, return to property page
//ELSE IF user logged in and propid GET variable exists AND propid is a property that user is a part of then show property details
//ELSE return to home page
$prop_name = "";
$street = "";
$city = "";
$province = "";
$postal = "";
$latitude = "";
$longitude = "";
$errors = array();
$provinces = array('British Columbia', 'Alberta', 'Saskatchewan', 'Manitoba', 'Ontario', 'Quebec', 'New Brunswick', 'Prince Edward Isand', 'Nova Scotia', 'Newfoundland and Labrador');

if(isset($_SESSION['role']) && isset($_GET['manage_propid'])){
    if($_SESSION['role'] == "landlord"){
        $properties = $_SESSION['props'];
        $propid = $_GET['manage_propid'];
        if(in_array($propid, $properties)){
            ///Grab property from database and unpack details
            $property = PropertiesClass::getPropertyById($propid);
            $prop_name = $property->getName();
            $street = $property->getStreet();
            $postal = $property->getPostal();
            $city = $property->getCity();
            $province = $property ->getProvince();
            $latitude = $property->getLatitude();
            $longitude = $property->getLongitude();
            $type = $property->getType();
           
            include('manage_property.php');
        } else {
            header("Location: ../index.php");
        }
    } else {
        header("Location: ../index.php");
    }
} else if (isset($_SESSION['role']) && isset($_GET['update_propid'])) {
    if($_SESSION['role'] == "landlord"){
        if(isset($_POST['update'])){
            $propid = $_GET['update_propid'];
            $landlord_id = $_SESSION['id'];
            $prop_name = htmlspecialchars($_POST['name']);
            $street = htmlspecialchars($_POST['street']);
            $postal = htmlspecialchars($_POST['postal']);
            $city = htmlspecialchars($_POST['city']);
            $province = htmlspecialchars($_POST['province']);
            $latitude = htmlspecialchars($_POST['latitude']);
            $longitude = htmlspecialchars($_POST['longitude']);

            $validator = new Validation();
            $validator->todoVal("Name", $prop_name, "required");
            $validator->todoVal("Street", $street, "required");
            $validator->todoVal("Postal Code", $postal, "postal");
            $validator->todoVal("City", $city, "required");
            $validator->todoVal("Province", $province, "required");
            $validator->todoVal("Latitude", $latitude, "required");
            $validator->todoVal("Latitude", $latitude, "latitude");
            $validator->todoVal("Longitude", $longitude, "required");
            $validator->todoVal("Longitude", $longitude, "longitude");
            $validator->validate();

            $errors = $validator->errors;
            if(empty($errors)){
                //SUCCESSFUL VALIDATION
                //DATABASE INTERACTION
                $property = new Property($landlord_id, $prop_name, $street, $postal, $city, $province, $latitude, $longitude);
                PropertiesClass::updateProperty($propid, $property);
                header("Location: index.php?propid=1");
            } else{
                include('manage_property.php');
            }

        } else if (isset($_POST['delete'])){
            $propid = $_GET['update_propid'];
            PropertiesClass::deleteProperty($propid);
            unset($_SESSION['props']);
            $_SESSION['props'] = UsersClass::getPropertyIDsofLandlord($_SESSION['id']);
            header("Location: ../user_dash/");
        } else {
            header("Location: ../user_dash/");
        }
    } else {
        header("Location: ../index.php");
    }
        
} else if(isset($_SESSION['role']) && isset($_GET['propid'])){
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
        $getSublets = subletDB::getpropertySublets($propid);
       
        
        include('propertyPage.php');
        
    } else {
        header("Location: ../user_dash");
    }
} else {
    header("Location: ../index.php");
}

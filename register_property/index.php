<?php
require_once('../model/config.php');
$cssArray[] = "register_prop.css";
function classloader($class) {
    $classStr = '../model/' . strtolower($class) . '.php';
    require_once $classStr;
}

spl_autoload_register('classloader');

///IF user logged in AND user is landlord, show property registration form
///ELSE go back to home
$prop_name = "";
$street = "";
$city = "";
$province = "";
$postal = "";
$latitude = "";
$longitude = "";
$errors = array();

if($_SESSION['role'] == 'landlord'){
    $errors = array();
    $landlord_id = $_SESSION['id'];
    if(isset($_POST['register'])){
        
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
            PropertiesClass::registerProperty($property);
            unset($_SESSION['props']);
            $_SESSION['props'] = UsersClass::getPropertyIDsofLandlord($landlord_id);
            include('registered.php');
            exit();
        }
    }
    
    $provinces = array('British Columbia', 'Alberta', 'Saskatchewan', 'Manitoba', 'Ontario', 'Quebec', 'New Brunswick', 'Prince Edward Isand', 'Nova Scotia', 'Newfoundland and Labrador');
    include('register_prop.php');
} else {
    header("Location: ../index.php");
}

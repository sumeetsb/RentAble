<?php
require_once ('../MapModel/propertiesClass.php');
require_once ('../../model/config.php');
require_once ('../MapModel/property.php');
require_once '../MapModel/db_connect.php';


function validateUserInput($userInput)
{
    $error = "";
    if(empty($userInput["name"])){
        $error .= "Name is required <br />";
    }
    if(empty($userInput["landlord_id"])){
        $error .= "Please, Enter your landlord ID <br />";
    }
    if(empty($userInput["street"])){
        $error .= "Street is required <br />";
    }
     if(empty($userInput["postal"])){
        $error .= "Postal Code is required <br />";
    }
     if(empty($userInput["city"])){
        $error .= "City is required <br />";
    }
    if(empty($userInput["province"])){
        $error .= "Province is required <br />";
    }  
    if ($error != "")
        {
        return $error;
        }
        else
            {
            $error = "valid";
            return $error;
            }
}
$errorList =validateUserInput($_POST);


if ($errorList!="valid") {    
    include('../MapView/addMarker.php');
//    echo $errorList;
}
else {

$l_id = $_POST['landlord_id'];
$name = $_POST['name'];
$street = $_POST['street'];
$postal = $_POST['postal'];
$city = $_POST['city'];
$province = $_POST['province'];
$lat = $_POST['lat'];
$lng = $_POST['lng'];
$type = $_POST['type'];
$property = new property($l_id, $name, $street, $postal, $city, $province, $lat, $lng, $type);
PropertiesClass::addMarker($property);
header('Location: ../MapView/markersAdmin.php');
}
//foreach($_POST as $key => $val){
//echo '[ '.$key.' ] => '.$val."<br />";}



 


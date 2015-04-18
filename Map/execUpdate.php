<?php
require_once ('propertiesClass.php');
require_once ('../model/config.php');
require_once ('property.php');
require_once 'db_connect.php';


//foreach($_POST as $key => $val){
//echo '[ '.$key.' ] => '.$val."<br />";}

//Get info from POST array
$l_id = $_POST['landlord_id'];
$name = $_POST['name'];
$street = $_POST['street'];
$postal = $_POST['postal'];
$city = $_POST['city'];
$province = $_POST['province'];
$lat = $_POST['lat'];
$lng = $_POST['lng'];
$type = $_POST['type'];
//$url = $_POST['url'];

//Create new object
$property = new property($l_id, $name, $street, $postal, $city, $province, $lat, $lng, $type);
//call update function
PropertiesClass::updateMarker($property, $_POST['id']);
echo "Success <br />";
header('Location: markersAdmin.php');
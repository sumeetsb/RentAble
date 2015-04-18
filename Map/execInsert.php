<?php
require_once ('propertiesClass.php');
require_once ('db_connect.php');
require_once ('property.php');

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

//foreach($_POST as $key => $val){
//echo '[ '.$key.' ] => '.$val."<br />";}
header('Location: markersAdmin.php');


 


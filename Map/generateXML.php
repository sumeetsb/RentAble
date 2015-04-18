<?php
require_once ('../model/config.php');
require_once('propertiesClass.php');
require_once 'db_connect.php';


//Parse to XML
function parseToXML($htmlStr) 
{ 
$xmlStr=str_replace('<','&lt;',$htmlStr); 
$xmlStr=str_replace('>','&gt;',$xmlStr); 
$xmlStr=str_replace('"','&quot;',$xmlStr); 
$xmlStr=str_replace("'",'&apos;',$xmlStr); 
$xmlStr=str_replace("&",'&amp;',$xmlStr); 
return $xmlStr; 
} 

//Get all markers
$result = PropertiesClass::getMarkers();

header("Content-type: text/xml");

echo '<markers>';

// foreeach for rows
foreach ($result as $row ){
    
    

  echo '<marker ';
  echo 'id="' . $row->id . '" ';
  echo 'name="' . parseToXML($row->name) . '" '; 
  echo 'street="' . parseToXML($row->street) . '" ';
  echo 'postal="' . $row->postal_code . '" ';
  echo 'city="' . $row->city . '" ';
  echo 'province="' . $row->province . '" ';
  echo 'lat="' . $row->latitude . '" ';
  echo 'lng="' . $row->longitude . '" ';
  echo 'type="' .$row->type . '" ';
  echo 'url="' . $row->url . '" ';
  echo '/>';
}

echo '</markers>';

?>
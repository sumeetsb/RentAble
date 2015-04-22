    <?php  
    require_once ('../../model/config.php');
    include ('../../view/header.php');
    require_once '../../Model/MapModel/db_connectt.php';
    require_once '../../Model/MapModel/propertiesClass.php';
  
  
    $result = PropertiesClass::getMarker($_POST['marker_id']);
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
echo $errorList;
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
//$url = $_POST['url'];

//Create new object
$property = new property($l_id, $name, $street, $postal, $city, $province, $lat, $lng, $type);
//call update function
PropertiesClass::updateMarker($property, $_POST['id']);
echo "Success <br />";
header('Location: ../MapView/markersAdmin.php');
}
//    
    foreach ($result as $row){     
    ?>
<html>
    <head>
        <title>Update property</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    </head>
    <body>
         <?php
     echo "<b>".$errorList."</b>" ?>
<legend>Update property</legend>
<form class="form-horizontal" action="../MapController/execUpdate.php" method="post">
    <fieldset style="margin-left: 2%; ">

        
<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="name">Name</label>
  <div class="controls">
    <input id="name" name="name" type="text" value="<?php echo $name = $row->name;
       ?>" class="input-xlarge">
    
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="landlord_id">Landlord ID</label>
  <div class="controls">
    <input id="landlord_id" name="landlord_id" type="text" value="<?php echo $name = $row->landlord_id;
       ?>"  class="input-xlarge">
    
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="street">Street</label>
  <div class="controls">
    <input id="street" name="street" type="text" value="<?php echo $name = $row->street;
       ?>"  class="input-xlarge">
    
  </div>
</div>


<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="city">City</label>
  <div class="controls">
    <input id="city" name="city" type="text" value="<?php echo $name = $row->city;
       ?>"  class="input-xlarge">
    
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="province">Province</label>
  <div class="controls">
    <input id="province" name="province" type="text" value="<?php echo $name = $row->province;
       ?>"  class="input-xlarge">
    
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="postal">Postal Code</label>
  <div class="controls">
    <input id="postal" name="postal" type="text" value="<?php echo $name = $row->postal_code;
       ?>"  class="input-xlarge">
    
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="lat">Latitude</label>
  <div class="controls">
    <input id="lat" name="lat" type="text" value="<?php echo $name = $row->latitude;
       ?>"  class="input-xlarge">
    
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="lng">Longitude</label>
  <div class="controls">
    <input id="lng" name="lng" type="text" value="<?php echo $name = $row->longitude;
       ?>"  class="input-xlarge">
    
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="type">Type</label>
  <div class="controls">
    <input id="type" name="type" type="text" value="<?php echo $name = $row->type;
       ?>"  class="input-xlarge">
  </div>
</div>

<!-- Button -->
<div class="control-group">
  <label class="control-label" for="btn"></label>
  <div class="controls">
    <input type="hidden" name='id' value="<?php echo $marker_id = $row->id;?>"/>
    <button id="btn" name="btn" class="btn btn-primary">Submit</button>
  </div>
</div>

</fieldset>
    
</form>
 </body>
</html>
<br />
<br />
<br />
<br />
    <?php }
include ('../../view/footer.php');?>



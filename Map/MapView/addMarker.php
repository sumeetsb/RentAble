<?php
require_once ('../../model/config.php');
include ('../../view/header.php');
require_once '../MapModel/db_connect.php';

;?>
<html>
    <head>
        <title>Add new property</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    </head>
    <body>

    <?php
     echo "<b>".$errorList."</b>" ?>
              <!-- Form Name -->
<legend>Insert new property</legend>
<form class="form-horizontal" action="../MapController/execInsert.php" method="post">
    <fieldset style="margin-left: 2%; ">
<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="name">Name</label>
  <div class="controls">
    <input id="name" name="name" type="text" 
            class="input-xlarge" value="<?php 
            if(isset($_POST["name"]))
                {echo $_POST["name"];} ?>" >
  
    
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="landlord_id">Landlord ID</label>
  <div class="controls">
    <input id="landlord_id" name="landlord_id" type="text" value="<?php 
            if(isset($_POST["landlord_id"]))
                {echo $_POST["landlord_id"];} ?>" class="input-xlarge">
    
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="street">Street</label>
  <div class="controls">
    <input id="street" name="street" type="text" value="<?php 
            if(isset($_POST["street"]))
                {echo $_POST["street"];} ?>"  class="input-xlarge">
    
  </div>
</div>


<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="city">City</label>
  <div class="controls">
    <input id="city" name="city" type="text" value = "<?php 
            if(isset($_POST["city"]))
                {echo $_POST["city"];} ?>" class="input-xlarge">
    
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="province">Province</label>
  <div class="controls">
    <input id="province" name="province" type="text" value = "<?php 
            if(isset($_POST["province"]))
                {echo $_POST["province"];} ?>" class="input-xlarge">
    
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="postal">Postal Code</label>
  <div class="controls">
    <input id="postal" name="postal" type="text" placeholder="" class="input-xlarge">
    
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="lat">Latitude</label>
  <div class="controls">
    <input id="lat" name="lat" type="text" placeholder="" class="input-xlarge">
    
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="lng">Longitude</label>
  <div class="controls">
    <input id="lng" name="lng" type="text" placeholder="" class="input-xlarge">
    
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="type">Type</label>
  <div class="controls">
    <input id="type" name="type" type="text" placeholder="" class="input-xlarge">
  </div>
</div>

<!-- Button -->
<div class="control-group">
  <label class="control-label" for="btn"></label>
  <div class="controls">
      <button id="btn_insert" name="btn_insert" type="submit" value="Submit" class="btn btn-primary">Submit</button>
  </div>
</div>
</fieldset>
</form>
<br>
<br>
<br>
<br>
 <?php
include ('../../view/footer.php');
        ?>
 </body>
</html>
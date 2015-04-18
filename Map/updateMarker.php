    <?php  
    require_once ('../model/config.php');
    include ('../view/header.php');
    require_once 'db_connect.php';
    require_once 'propertiesClass.php';
    
    $result = PropertiesClass::getMarker($_POST['marker_id']);
    foreach ($result as $row){     
    ?>
<html>
    <head>
        <title>Add new property</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    </head>
    <body>
      
<legend>Insert new property</legend>
<form class="form-horizontal" action="execUpdate.php" method="post">
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
       
    
<?php }
include ('../view/footer.php');?>



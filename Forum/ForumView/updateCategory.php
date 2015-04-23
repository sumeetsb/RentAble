<?php
//create_cat.php
require_once ('../../model/config.php');
require_once '../../Model/ForumModel/DBconnect.php';
require_once '../../Model/ForumModel/CategoryClass.php';
require_once '../../Model/ForumModel/DBFunctionsClass.php';
require_once ('../../view/header.php'); 
$cssArray[] = "register.css";

if(isset($_POST['cat_id'])){
 $result = DBFunctionsClass::getSingleCategory($_POST['cat_id']);
 } else {
 $result = DBFunctionsClass::getSingleCategory($id);}
    foreach ($result as $row){  
?>
<!DOCTYPE html>
<html>
    <head>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
         <link rel="stylesheet" href="../../css/forum.css">
        <title></title>
    </head>
    <body>
        <legend>Update Category</legend>
<form class="form-horizontal" action="../ForumController/execCategoryUpdate.php" method="post">
    <fieldset style="margin-left: 2%; ">

        
<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="cat_name">Category Name</label>
  <div class="controls">
    <input id="name" name="cat_name" type="text" value="<?php echo $cat_name = $row->cat_name;
       ?>" class="input-xlarge">
    
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="cat_description">Category Description</label>
  <div class="controls">
    <input id="landlord_id" name="cat_description" type="text" value="<?php echo $cat_description = $row->cat_description;
       ?>"  class="input-xlarge">
    
  </div>
</div>
<div class="control-group">
  <label class="control-label" for="btn"></label>
  <div class="controls">
    <input type="hidden" name='id' value="<?php echo $cat_id = $row->cat_id;?>"/>
    <button  name="update" class="btn btn-primary">Submit</button>
  </div>
</div>
 <?php  
    }
      if(isset($errors))
        {
        foreach ($errors as $er)
            {
            echo '<p class="error">'.$er.'</p>';
            }
        }
include ('../../view/footer.php'); 
?>
  </body>
</html>



<?php
require_once ('../../model/config.php');
require_once '../../Model/ForumModel/DBconnect.php';
require_once '../../Model/ForumModel/PostClass.php';
require_once '../../Model/ForumModel/DBFunctionsClass.php';
require_once ('../../view/header.php'); 
if(isset($_POST['post_id'])){
$result = DBFunctionsClass::getSinglePost($_POST['post_id']);
}else
    {
    $result = DBFunctionsClass::getSinglePost($id);
    }
    foreach ($result as $row){  
?>
<!DOCTYPE html>
<html>
    <head>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
         <link rel="stylesheet" type="text/css" href="../../css/main.css" />
        <link rel="stylesheet" href="../../css/forum.css">
        <title></title>
    </head>
    <body>
        <legend>Update Category</legend>
        <form class="form-horizontal" action="../ForumController/execPostUpdate.php?id=<?php $row->post_id ?>" method="post">
    <fieldset style="margin-left: 2%; ">

        
<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="post_thread">Post Thread</label>
  <div class="controls">
    <input id="name" name="post_thread" type="text" value="<?php echo $post_thread = $row->post_thread;
       ?>" class="input-xlarge">
    
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="post_by">Post Author</label>
  <div class="controls">
    <input id="landlord_id" name="post_by" type="text" value="<?php echo $post_by = $row->post_by;
       ?>"  class="input-xlarge">
    
  </div>
  
  <!-- Text input-->
<div class="control-group">
  <label class="control-label" for="post_content">Post Content</label>
  <div class="controls">
    <input id="landlord_id" name="post_content" type="text" value="<?php echo $post_content = $row->post_content;
       ?>"  class="input-xlarge">
    
  </div>
  
</div>
  
  <!-- Text input-->
<div class="control-group">
  <label class="control-label" for="post_date">Post Date</label>
  <div class="controls">
    <input id="landlord_id" name="post_date" type="text" value="<?php echo $post_date = $row->post_date;
       ?>"  class="input-xlarge">
    
  </div>
  
  
<div class="control-group">
  <label class="control-label" for="btn"></label>
  <div class="controls">
    <input type="hidden" name='id' value="<?php echo $post_id = $row->post_id;?>"/>
    <button id="btn" name="update" class="btn btn-primary">Submit</button>
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





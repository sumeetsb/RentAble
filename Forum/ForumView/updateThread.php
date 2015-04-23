<?php
require_once ('../../model/config.php');
require_once '../../Model/ForumModel/DBconnect.php';
require_once '../../Model/ForumModel/CategoryClass.php';
require_once '../../Model/ForumModel/DBFunctionsClass.php';
require_once ('../../view/header.php');
if(isset($_POST['thread_id'])){
$result = DBFunctionsClass::getSingleThread($_POST['thread_id']);
}else
    {
    $result = DBFunctionsClass::getSingleThread($id);
    }
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
        <legend>Update Thread</legend>
        <form class="form-horizontal" action="../ForumController/execThreadUpdate.php?id=<?php $row->thread_id ?>" method="post">
    <fieldset style="margin-left: 2%; ">

        
<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="thread_subject">Thread Subject</label>
  <div class="controls">
    <input id="name" name="thread_subject" type="text" value="<?php echo $thread_subject = $row->thread_subject;
       ?>" class="input-xlarge">
    
  </div>
</div>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="thread_date">Thread Date</label>
  <div class="controls">
    <input id="landlord_id" name="thread_date" type="text" value="<?php echo $thread_date = $row->thread_date;
       ?>"  class="input-xlarge">
    
  </div>
  
  <!-- Text input-->
<div class="control-group">
  <label class="control-label" for="thread_cat">Thread Category</label>
  <div class="controls">
    <input id="landlord_id" name="thread_cat" type="text" value="<?php echo $thread_cat = $row->thread_cat;
       ?>"  class="input-xlarge">
    
  </div>
  
</div>
  
  <!-- Text input-->
<div class="control-group">
  <label class="control-label" for="thread_by">Thread Author</label>
  <div class="controls">
    <input id="landlord_id" name="thread_by" type="text" value="<?php echo $thread_by = $row->thread_by;
       ?>"  class="input-xlarge">
    
  </div>
  
  
<div class="control-group">
  <label class="control-label" for="btn"></label>
  <div class="controls">
    <input type="hidden" name='id' value="<?php echo $cat_id = $row->thread_id;?>"/>
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




<?php
require_once ('../../model/config.php');
require_once '../../Model/ForumModel/DBconnect.php';
require_once '../../Model/ForumModel/CategoryClass.php';
require_once '../../Model/ForumModel/DBFunctionsClass.php';
require_once ('../../view/header.php'); 
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
 <?php
 
  if(isset($_SESSION['admin'])){
    echo "<form method='post' action='../ForumController/execCategoryInsert.php'>
        Category name:<br /> <input type='text' name='cat_name' /><br />
        
        Category description: <textarea class='form-control' name='cat_description'>
        </textarea>
        
        <input type='submit' name='insert'  class='btn btn-primary btn-lg' value='Create category' />
     </form>";
    include ('../../view/footer.php'); 
    if(isset($errors))
        {
        foreach ($errors as $er)
            {
            echo '<p class="error">'.$er.'</p>';
            }
        }
}else {echo "You do not have permission";}
?>
  </body>
</html>


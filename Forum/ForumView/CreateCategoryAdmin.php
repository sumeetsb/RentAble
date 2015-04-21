<?php
//create_cat.php
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
    <link rel="stylesheet" href="../../css/forum.css">       
    <title></title>
    </head>
    <body>
 <?php
if($_SERVER['REQUEST_METHOD'] != 'POST')
{
    //the form hasn't been posted yet, display it
    echo "<form method='post' action=''>
        Category name:<br /> <input type='text' name='cat_name' /><br />
        
        Category description: <textarea class='form-control' name='cat_description' />
        </textarea>
        
        <input type='submit'  class='btn btn-primary btn-lg' value='Create category' />
     </form>";
    include ('../../view/footer.php'); 

}
else
{
    $cat_name = $_POST["cat_name"];
    $cat_description = $_POST["cat_description"];
    $category = new categoryClass($cat_name, $cat_description);
    $result = DBFunctionsClass::addCategory($category);
    header('Location: ../ForumView/index.php');
}
?>
  </body>
</html>


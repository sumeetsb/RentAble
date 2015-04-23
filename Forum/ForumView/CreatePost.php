<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
   <link rel="stylesheet" type="text/css" href="../../css/main.css" />
</head>
<?php
require_once ('../../model/config.php');
require_once ('../../view/header.php');
require_once '../../Model/ForumModel/DBFunctionsClass.php';
if($_SERVER['REQUEST_METHOD'] != 'POST')
{
    echo 'This file cannot be called directly.';
}
else
{
    echo '<h1>Create Post</h1>';
    echo  '<form method="post" action="../ForumController/execPostInsert.php">';
    echo '<textarea class = "txt_post" name="PostContent" ></textarea><br><br>';
    echo '<input type="submit" name="insert" value="Add Message" />';
    echo '</form>';
}
if(isset($errors))
        {
        foreach ($errors as $er)
            {
            echo '<p class="error">'.$er.'</p>';
            }
        }
include ('../../view/footer.php'); 






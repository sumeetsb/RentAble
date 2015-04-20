<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
</head>
<?php
require_once ('../../model/config.php');
require_once ('../../view/header.php');
require_once '../ForumModel/DBFunctionsClass.php';
if($_SERVER['REQUEST_METHOD'] != 'POST')
{
    echo 'This file cannot be called directly.';
}
else
{
    echo '<h1>Create Post</h1>';
    echo  '<form method="post" action="../ForumController/AddPost.php?id='.$_GET['id'].'">';
    echo '<textarea class = "txt_post" name="PostContent"></textarea><br><br>';
    echo '<input type="submit" value="Add Message" />';
    echo '</form>';
}
include ('../../view/footer.php'); 






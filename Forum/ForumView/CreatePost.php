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

    echo  '<form method="post" action="../ForumController/AddPost.php?id='.$_GET['id'].'">';
    echo '<input type="submit" value="Add Message" />';
    echo '<textarea name="PostContent"></textarea>';
    echo '</form>';
}
include ('../../view/footer.php'); 






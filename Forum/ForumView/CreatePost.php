<?php
require_once ('../../model/config.php');
require_once ('../../view/header.php');
require_once '../ForumModel/DBFunctionsClass.php';
   echo  '<form method="post" action="AddPost.php?id='.$_GET['id'].'">';
    echo '<input type="submit" value="Add Message" />';
    echo '<textarea name="PostContent"></textarea>';
    echo '</form>';
include ('../../view/footer.php'); 





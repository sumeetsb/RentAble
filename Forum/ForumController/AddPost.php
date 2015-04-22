<?php
require_once ('../../model/config.php');
require_once '../../Model/ForumModel/PostClass.php';
require_once '../../Model/ForumModel/DBFunctionsClass.php';
function validateUserInput($userInput)
{
    $error = "";
    if(empty($userInput["PostContent"])){
        $error .= " Post can't be empty <br />";
    }

    if ($error != "")
        {
        return $error;
        }
        else
            {
            $error = "valid";
            return $error;
            }
}
$errorList = validateUserInput($_POST);


if ($errorList!="valid") {    
    include('../ForumView/CreatePost.php');
//    echo $errorList;
}
else {
$post_thread = $_GET['id'];
$post_author = $_SESSION['id'];
$post_content = $_POST['PostContent'];
$post_date = (new \DateTime())->format('Y-m-d H:i:s');
$post = new postClass($post_thread, $post_author, $post_content, $post_date);
DBFunctionsClass::addPost($post);
header('Location: ../ForumView/index.php');
}




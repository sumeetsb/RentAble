<?php
require_once ('../../model/config.php');
require_once '../../Model/ForumModel/PostClass.php';
require_once '../../Model/ForumModel/DBFunctionsClass.php';

$cssArray[] = "register_prop.css";
function classloader($class) {
    $classStr = '../../model/' . strtolower($class) . '.php';
    require_once $classStr;
}

spl_autoload_register('classloader');

///IF user logged in AND user is landlord, show property registration form
///ELSE go back to home
$post_content = "";
$errors = array();

if(isset($_SESSION['admin'])){
    $errors = array();
    if(isset($_POST['insert'])){
        
        $post_content = htmlspecialchars($_POST['PostContent']);
  
        $validator = new Validation();
        $validator->todoVal("Post Content", $post_content, "required");
        $validator->validate();
        
        $errors = $validator->errors;
        if(empty($errors)){
$post_thread = $_GET['id'];
$post_author = $_SESSION['id'];
$post_content = $_POST['PostContent'];
$post_date = (new \DateTime())->format('Y-m-d H:i:s');
$post = new postClass($post_thread, $post_author, $post_content, $post_date);
DBFunctionsClass::addPost($post);
header('Location: ../ForumView/index.php');
    }else {
//    $id = $_POST['id'];
    include ('../ForumView/CreatePost.php');
}
    
    
}

        }





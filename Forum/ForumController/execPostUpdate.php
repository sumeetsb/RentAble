<?php
require_once ('../../model/config.php');
require_once '../../Model/ForumModel/DBconnect.php';
require_once '../../Model/ForumModel/PostClass.php';
require_once '../../Model/ForumModel/DBFunctionsClass.php';
function classloader($class) {
    $classStr = '../../model/' . strtolower($class) . '.php';
    require_once $classStr;
}

spl_autoload_register('classloader');


$post_thread = "";
$post_author = "";
$post_content = "";
$post_date = "";
$errors = array();

if(isset($_SESSION['admin'])){
    $errors = array();
    if(isset($_POST['update'])){
        
        $post_thread = htmlspecialchars($_POST['post_thread']);
        $post_author = htmlspecialchars($_POST['post_by']);
        $post_content = htmlspecialchars($_POST['post_content']);
        $post_date = htmlspecialchars($_POST['post_date']);
  
        $validator = new Validation();
        $validator->todoVal("post_thread", $post_thread, "required");
        $validator->todoVal("post_by", $post_author, "required");
        $validator->todoVal("post_content", $post_content, "required");
        $validator->todoVal("post_date", $post_date, "required");
        $validator->validate();
        
        $errors = $validator->errors;
        if(empty($errors)){
$post_thread = $_POST['post_thread'];
$post_author = $_POST['post_by'];
$post_content = $_POST['post_content'];
$post_date = $_POST['post_date'];
$post = new postClass($post_thread, $post_author, $post_content, $post_date);
DBFunctionsClass::updatePost($post, $_POST['id']);
header('Location: ../ForumView/IndexAdmin.php');
}else {
    $id = $_POST['id'];
    include ('../ForumView/updatepost.php');
}
    
    
}
  }


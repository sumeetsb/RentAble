<?php
require_once ('../../model/config.php');
require_once '../../Model/ForumModel/DBconnect.php';
require_once '../../Model/ForumModel/ThreadClass.php';
require_once '../../Model/ForumModel/PostClass.php';
require_once '../../Model/ForumModel/DBFunctionsClass.php';
require_once ('../../view/header.php');
$cssArray[] = "register_prop.css";
function classloader($class) {
    $classStr = '../../model/' . strtolower($class) . '.php';
    require_once $classStr;
}

spl_autoload_register('classloader');


$thread_subject = "";
$thread_category = "";
$thread_author = "";
$errors = array();

if(isset($_SESSION['admin'])){
    $errors = array();
    if(isset($_POST['insert'])){
        
        $thread_subject = htmlspecialchars($_POST['thread_subject']);
        $thread_cat = htmlspecialchars($_POST['thread_cat']);
  
        $validator = new Validation();
        $validator->todoVal("Thread subject", $thread_subject, "required");
        $validator->todoVal("Thread category", $thread_cat, "required");
        $validator->validate();
        
        $errors = $validator->errors;
        if(empty($errors)){
 $thread_cat = $_POST['thread_cat'];
 $thread_author = $_SESSION['id'];      
 $thread_date = (new \DateTime())->format('Y-m-d H:i:s');
 $thread_subject = $_POST["thread_subject"];
 $thread = new ThreadClass($thread_subject, $thread_date, $thread_cat, $thread_author);
 $resultForThread = DBFunctionsClass::addThread($thread);
 header('Location: ../ForumView/index.php'); 
}else {
//    $id = $_POST['id'];
    include ('../ForumView/CreateThread.php');
}
    
    
}

        }

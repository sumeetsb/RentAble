<?php
require_once ('../../model/config.php');
require_once '../../Model/ForumModel/DBconnect.php';
require_once '../../Model/ForumModel/ThreadClass.php';
require_once '../../Model/ForumModel/DBFunctionsClass.php';
$cssArray[] = "register_prop.css";
function classloader($class) {
    $classStr = '../../model/' . strtolower($class) . '.php';
    require_once $classStr;
}

spl_autoload_register('classloader');


$thread_subject = "";
$thread_date = "";
$thread_category = "";
$thread_author = "";
$errors = array();

if(isset($_SESSION['admin'])){
    $errors = array();
    if(isset($_POST['update'])){
        
        $thread_subject = htmlspecialchars($_POST['thread_subject']);
        $thread_date = htmlspecialchars($_POST['thread_date']);
        $thread_category = htmlspecialchars($_POST['thread_cat']);
        $thread_author = htmlspecialchars($_POST['thread_by']);
  
        $validator = new Validation();
        $validator->todoVal("thread_subject", $thread_subject, "required");
        $validator->todoVal("thread_date", $thread_date, "required");
        $validator->todoVal("thread_cat", $thread_category, "required");
        $validator->todoVal("thread_by", $thread_author, "required");
        $validator->validate();
        
        $errors = $validator->errors;
        if(empty($errors)){
$thread_subject = $_POST['thread_subject'];
$thread_date = $_POST['thread_date'];
$thread_category = $_POST['thread_cat'];
$thread_author = $_POST['thread_by'];
$thread = new ThreadClass($thread_subject, $thread_date, $thread_category, $thread_author);
DBFunctionsClass::updateThread($thread, $_POST['id']);
header('Location: ../ForumView/IndexAdmin.php');
}else {
    $id = $_POST['id'];
    include ('../ForumView/updatethread.php');
}
    
    
}

        }


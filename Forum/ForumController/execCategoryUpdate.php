<?php
require_once ('../../model/config.php');
require_once '../../Model/ForumModel/DBconnect.php';
require_once '../../Model/ForumModel/CategoryClass.php';
require_once '../../Model/ForumModel/DBFunctionsClass.php';
function classloader($class) {
    $classStr = '../../model/' . strtolower($class) . '.php';
    require_once $classStr;
}

spl_autoload_register('classloader');


$cat_name = "";
$cat_description = "";
$errors = array();

if(isset($_SESSION['admin'])){
    $errors = array();
    if(isset($_POST['update'])){
        
        $cat_name = htmlspecialchars($_POST['cat_name']);
        $cat_description = htmlspecialchars($_POST['cat_description']);
  
        $validator = new Validation();
        $validator->todoVal("Name of Category", $cat_name, "required");
        $validator->todoVal("Category description", $cat_description, "required");
        $validator->validate();
        
        $errors = $validator->errors;
        if(empty($errors)){
$cat_name = $_POST['cat_name'];
$cat_description = $_POST['cat_description'];
$category = new CategoryClass($cat_name, $cat_description);
DBFunctionsClass::updateCategory($category, $_POST['id']);
header('Location: ../ForumView/IndexAdmin.php');
}else {
    $id = $_POST['id'];
    include ('../ForumView/UpdateCategory.php');
}
    
    
}

        }



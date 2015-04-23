<?php
require_once ('../../model/config.php');
require_once '../../Model/ForumModel/DBconnect.php';
require_once '../../Model/ForumModel/CategoryClass.php';
require_once '../../Model/ForumModel/DBFunctionsClass.php';
require_once ('../../view/header.php'); 
$cssArray[] = "register_prop.css";
function classloader($class) {
    $classStr = '../../model/' . strtolower($class) . '.php';
    require_once $classStr;
}

spl_autoload_register('classloader');

///IF user logged in AND user is landlord, show property registration form
///ELSE go back to home
$cat_name = "";
$cat_description = "";
$errors = array();

if(isset($_SESSION['admin'])){
    $errors = array();
    if(isset($_POST['insert'])){
        
        $cat_name = htmlspecialchars($_POST['cat_name']);
        $cat_description = htmlspecialchars($_POST['cat_description']);
  
        $validator = new Validation();
        $validator->todoVal("Category Name", $cat_name, "required");
        $validator->todoVal("Category Description", $cat_description, "required");
        $validator->validate();
        
        $errors = $validator->errors;
        if(empty($errors)){
    $cat_name = $_POST["cat_name"];
    $cat_description = $_POST["cat_description"];
    $category = new categoryClass($cat_name, $cat_description);
    $result = DBFunctionsClass::addCategory($category);
    header('Location: ../ForumView/index.php');
    }else {
//    $id = $_POST['id'];
    include ('../ForumView/CreateCategoryAdmin.php');
}
    
    
}

        }

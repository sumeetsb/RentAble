<?php
require_once ('../../model/config.php');
require_once '../ForumModel/DBconnect.php';
require_once '../ForumModel/CategoryClass.php';
require_once '../ForumModel/DBFunctionsClass.php';

$cat_name = $_POST['cat_name'];
$cat_description = $_POST['cat_description'];
$category = new CategoryClass($cat_name, $cat_description);
DBFunctionsClass::updateCategory($category, $_POST['id']);
header('Location: ../ForumView/IndexAdmin.php');



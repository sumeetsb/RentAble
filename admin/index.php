<?php
require '../model/config.php';
$cssArray[] = "admin.css";

function classloader($class){
    $classStr = '../model/' . strtolower($class) . '.php';
    require_once $classStr;
}

spl_autoload_register('classloader');

if(isset($_SESSION['admin'])){
    include('admin.php');
} else {
    if(isset($_POST['login'])){
        
    }
    include('login.php');
}



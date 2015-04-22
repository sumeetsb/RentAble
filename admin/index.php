<?php
require '../model/config.php';
$cssArray[] = "admin.css";

function classloader($class){
    $classStr = '../model/' . strtolower($class) . '.php';
    require_once $classStr;
}

spl_autoload_register('classloader');

$error = "";

if(isset($_SESSION['admin']) && isset($_GET['logout'])){
    if($_GET['logout'] == "true"){
        
        session_destroy();
        header("Location: ../index.php");
        exit();
    }
}

if(isset($_SESSION['user'])){
    $error .= "You must logout as a user in order to log in as admin.<br />";
    include 'login.php';
    exit();
}


if(isset($_SESSION['admin'])){
    include('admin.php');
} else {
    if(isset($_POST['login'])){
            ///IF login button hit, grab admin from admin table and store details in session
            // and redirect to user dashboard
            ///ELSE reload login page with error message
        
        if(isset($_SESSION['user'])){
            include 'login.php';
            $error .= "You must logout as a user in order to log in as admin.<br />";
            exit();
        }

        $login = UsersClass::getAdmin($_POST["user"], $_POST["pass"]);
        if($login != null){
            $_SESSION['admin'] = $login->getUser();
            $_SESSION['role'] = "admin";
            include ('admin.php');
        } else {
            $error += "Invalid username or password provided.<br />";
            include('login.php');
        }
    } else {
        include('login.php');
    }
}



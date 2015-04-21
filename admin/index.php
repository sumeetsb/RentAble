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
            ///IF login button hit, grab admin from admin table and store details in session
            // and redirect to user dashboard
            ///ELSE reload login page with error message
            
            $login = UsersClass::getAdmin($_POST["user"], $_POST["pass"]);
            if($login != null){
                foreach ($_SESSION as $v){
                    unset($v);
                }
                $_SESSION['admin'] = $login->getUser();
                $_SESSION['role'] = "admin";
                include ('admin.php');
            } else {
                $error = "Invalid username or password provided.";
            }
    }
    include('login.php');
}



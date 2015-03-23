<?php
require_once('../model/config.php');
require_once('../model/user.php');
require_once('../model/usersClass.php');


$error = "";

if(isset($_SESSION['user'])){
    header("Location ../index.php");
} else {
    
    $months = array('January', 'February', 'March', 'April','May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
    
    
    if(isset($_POST['register'])){
        $val = true;
        foreach($_POST as $v){
            if($v == $_POST['pass2']){
                if($v != $_POST['pass']){
                    $val = false;
                    $error = "Passwords don't match.<br />";
                    break;
                }
            }
            if(empty($v)){
                $val = false;
                break;
            }
            
        }
        if($val == true){
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $email = $_POST['email'];
            $uname = $_POST['uname'];
            $pass = $_POST['pass'];
            $fdate = new DateTime($_POST['year']. "-" . $_POST['month']."-" . $_POST['day']);
            $sdate = new DateTime();
            $age = $sdate->diff($fdate)->y;
            if(isset($_POST['role'])){
                $role = $_POST['role'];
            } else {
                $role = 'tenant';
            }
            $phone = $_POST['phone'];
            try {
                $user = new User($fname, $lname, $uname, $pass, $email, $phone, $role, $age);
                UsersClass::makeUser($user);
                include('thankyou.php');
                exit();
            } catch (Exception $ex) {
                echo $ex->getMessage();
            }
        } else {
            $error .= "FORM ERROR WHAT?!";
        }
    }
    
    
    include('register.php');
}
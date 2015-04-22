<?php
require_once('../model/config.php');

function classloader($class) {
    $classStr = '../model/' . strtolower($class) . '.php';
    require_once $classStr;
}

spl_autoload_register('classloader');

if(isset($_SESSION['role'])){
    
    if(isset($_SESSION['props'])){
        $props = $_SESSION['props'];
        $pid = $_GET['propid'];
        
        if(in_array($pid, $props)){
            $property = PropertiesClass::getPropertyById($pid);
            $pname = $property->getName();
            
            $notices = Noticeboard::getAllNoticesOfProperty($pid);
        }else{
            header("Location: ../index.php");
            exit();
        }
    }
    
    switch ($_SESSION['role']){
        
        case 'landlord':
            include('notices.php');
            break;
        
        case 'tenant':
            include('notices.php');
            break;
        default :
            header("Location: ../index.php");
            exit();
            break;
        
    }
} else {
    header("Location: ../index.php");
}
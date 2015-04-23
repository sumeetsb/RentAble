<?php
require_once('../model/config.php');

function classloader($class) {
    $classStr = '../model/' . strtolower($class) . '.php';
    require_once $classStr;
}

spl_autoload_register('classloader');

$errors = array();
if(isset($_SESSION['role'])){
    
    if(isset($_SESSION['props'])){
        $props = $_SESSION['props'];
        $pid = $_GET['propid'];
        
        
        if(in_array($pid, $props)){
            if(isset($_GET['delete_id'])){
                Noticeboard::deleteNotice($_GET['delete_id']);
            }
            if(isset($_POST['postNotice'])){
                $validator = new Validation();
                $validator->todoVal("Subject", $_POST['subject'], "required");
                $validator->todoVal("Notice", $_POST['notice'], "required");
                $validator->validate();
                $errors = $validator->errors;
                if(empty($errors)){
                    $postNotice = new Notice($pid, $_SESSION['id'],$_POST['subject'], $_POST['notice']);
                    Noticeboard::postNotice($postNotice);
                }
            }
            
            
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
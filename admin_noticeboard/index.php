<?php
require_once '../model/config.php';
$cssArray[] = 'noticesAdmin.css';

function classloader($class) {
    $classStr = '../model/' . strtolower($class) . '.php';
    require_once $classStr;
}

spl_autoload_register('classloader');

if(isset($_SESSION['admin'])){
    $notices = Noticeboard::getAllNotices();
    
    include('manage_noticeboards.php');
}else{
    header("Location: ../index.php");
}
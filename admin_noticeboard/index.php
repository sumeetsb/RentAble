<?php
require_once '../model/config.php';


function classloader($class) {
    $classStr = '../model/' . strtolower($class) . '.php';
    require_once $classStr;
}

spl_autoload_register('classloader');

if(isset($_SESSION['admin'])){
    if(isset($_GET['delete_id'])){
        $nid = $_GET['delete_id'];
        Noticeboard::deleteNotice($nid);
        header("Location: index.php");
        exit();
    }
    $notices = Noticeboard::getAllNotices();
    
    include('manage_noticeboards.php');
}else{
    header("Location: ../index.php");
}
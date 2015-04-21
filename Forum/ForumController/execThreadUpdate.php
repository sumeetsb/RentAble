<?php
require_once ('../../model/config.php');
require_once '../../Model/ForumModel/DBconnect.php';
require_once '../../Model/ForumModel/ThreadClass.php';
require_once '../../Model/ForumModel/DBFunctionsClass.php';

$thread_subject = $_POST['thread_subject'];
$thread_date = $_POST['thread_date'];
$thread_category = $_POST['thread_cat'];
$thread_author = $_POST['thread_by'];
$thread = new ThreadClass($thread_subject, $thread_date, $thread_category, $thread_author);
DBFunctionsClass::updateThread($thread, $_POST['id']);
header('Location: ../ForumView/IndexAdmin.php');


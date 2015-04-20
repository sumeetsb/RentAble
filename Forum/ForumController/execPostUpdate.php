<?php
require_once ('../../model/config.php');
require_once '../ForumModel/DBconnect.php';
require_once '../ForumModel/PostClass.php';
require_once '../ForumModel/DBFunctionsClass.php';

$post_thread = $_POST['post_thread'];
$post_author = $_POST['post_by'];
$post_content = $_POST['post_content'];
$post_date = $_POST['post_date'];
$post = new postClass($post_thread, $post_author, $post_content, $post_date);
DBFunctionsClass::updatePost($post, $_POST['id']);
header('Location: ../ForumView/IndexAdmin.php');



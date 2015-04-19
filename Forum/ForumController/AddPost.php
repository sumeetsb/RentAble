<?php
require_once ('../../model/config.php');
require_once '../ForumModel/PostClass.php';
require_once '../ForumModel/DBFunctionsClass.php';
$post_thread = $_GET['id'];
$post_author = $_SESSION['id'];
$post_content = $_POST['PostContent'];
$post_date = (new \DateTime())->format('Y-m-d H:i:s');
$post = new postClass($post_thread, $post_author, $post_content, $post_date);
DBFunctionsClass::addPost($post);
header('Location: ../ForumView/index.php');




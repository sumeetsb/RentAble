<?php
require_once '..PostClass/ForumModel/.php';
require_once '../ForumModel/DBFunctionsClass.php';
$post_thread = $_GET['id'];
$post_author = $_SESSION['id'];
$post_content = $_POST['postContent'];
$post_date = (new \DateTime())->format('Y-m-d H:i:s');
$post = new postClass($post_thread, $post_author, $post_content, $post_date);
DBFunctionsClass::addPost($post);
header('Location: ../ForumView/Thread.php');




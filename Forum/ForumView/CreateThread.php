<?php
require_once ('../../model/config.php');
require_once '../ForumModel/DBconnect.php';
require_once '../ForumModel/ThreadClass.php';
require_once '../ForumModel/PostClass.php';
require_once '../ForumModel/DBFunctionsClass.php';
require_once ('../../view/header.php'); 

 
//echo '<h2>Create a topic</h2>';
//if($_SESSION['signed_in'] == false)
//{
//    //the user is not signed in
//    echo 'Only registred users can create threads';
//}
//else
//{
//session_start();
    //the user is signed in
    if($_SERVER['REQUEST_METHOD'] != 'POST')
    {   
                echo '<form method="post" action="">
                    Subject: <input type="text" name="thread_subject" />
                    Category:'; 
                $resultForCategories = DBFunctionsClass::getCategories();
                echo '<select name="thread_cat">';
                    foreach($resultForCategories as $row)
                    {
                        echo '<option value="' . $row->cat_id . '">' . $row->cat_name . '</option>';
                    }
                echo '</select>'; 
                     
//                echo 'Message: <textarea name="post_content" /></textarea>
                 echo '<input type="submit" value="Create thread" />
                 </form>';
                include ('../../view/footer.php'); 

    }
    else
    {
                $thread_cat = $_POST['thread_cat'];
                $thread_author = $_SESSION['id'];      
                $thread_date = (new \DateTime())->format('Y-m-d H:i:s');
                $thread_subject = $_POST["thread_subject"];
                $thread = new ThreadClass($thread_subject, $thread_date, $thread_cat, $thread_author);
                $resultForThread = DBFunctionsClass::addThread($thread);
                header('Location: ../ForumView/index.php');         
    
//                $post_content = $_POST['post_content'];
//                $post_date = (new \DateTime())->format('Y-m-d H:i:s');
//                $post_thread = mysql_insert_id();
//                $post_author = $_SESSION['id'];
//                                $post = new postClass($post_thread, $post_author, $post_content, $post_date);
//                $resultForPost = DBFunctionsClass::addPost($post);
                               
    }

            
        
    
           
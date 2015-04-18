<?php
include '../ForumModel/DBconnect.php';
include '../ForumModel/ThreadClass.php';
include '../ForumModel/PostClass.php';
include '../ForumModel/DBFunctionsClass.php';
include ('../../view/header.php'); 

 
//echo '<h2>Create a topic</h2>';
//if($_SESSION['signed_in'] == false)
//{
//    //the user is not signed in
//    echo 'Only registred users can create threads';
//}
//else
//{
session_start();
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
                     
                echo 'Message: <textarea name="post_content" /></textarea>
                    <input type="submit" value="Create thread" />
                 </form>';
                include ('../../view/footer.php'); 

    }else{
                $thread_cat = $_POST['thread_cat'];
                $thread_author = "Vasya";
//                        $_SESSION['user_id'];
                $thread_date = 1;
                $thread_subject = $_POST["thread_subject"];
                $thread = new ThreadClass($thread_subject, $thread_date, $thread_cat, $thread_author);
                $resultForThread = DBFunctionsClass::addThread($thread);
                
                
                $post_content = $_POST['post_content'];
                $post_date = 1;
                $post_thread = mysql_insert_id();
                $post_author = "Vasya";  
                $post = new postClass($post_thread, $post_author, $post_content, $post_date);
                $resultForPost = DBFunctionsClass::addPost($post);
                                    
    }

            
        
    
           
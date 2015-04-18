<?php
require_once 'DBconnect.php';
require_once 'ForumClass.php';
class DBFunctionsClass 
{
    public static function addCategory($category) {
        $dbcon = Db_connect::getDB();
//        $cat_id = $category->getCategoryId();
        $cat_name = $category->getCategoryName();
        $cat_description = $category->getCategoryDescription();
        $query =
            "INSERT INTO categories
                 (cat_name, cat_description)
             VALUES
                 ('$cat_name', '$cat_description')";
        $row_count = $dbcon->exec($query);
        return $row_count;
    }
    
     public static function getCategories() {
        $dbcon = Db_connect::getDB();
        $query = "SELECT * FROM categories";
        $result = $dbcon->query($query);
        $result->setFetchMode(PDO::FETCH_OBJ);
        return $result;
    }
    
    public static function addThread($thread) {
        $dbcon = Db_connect::getDB();
//        $cat_id = $category->getCategoryId();
        $thread_subject = $thread->getThreadSubject();
        $thread_date = $thread->getThreadDate();
        $thread_category = $thread->getThreadCategory();
        $thread_author = $thread->getThreadAuthor();
        
        $query =
            "INSERT INTO topics
                 (thread_subject,thread_date, topic_cat, topic_by)
             VALUES
                 ('$thread_subject', '$thread_date', '$thread_category', '$thread_author')";
        $row_count = $dbcon->exec($query);
        return $row_count;
    }
    
    public static function addPost($post)
            {
                $dbcon = Db_connect::getDB();
                $post_thread = $post->getPostThread();
                $post_author = $post->getPostAuthor();
                $post_content = $post->getPostContent();
                $post_date = $post->getPostDate();
                
                $query =
            "INSERT INTO topics
                 (post_content,post_date, post_topic, post_by)
             VALUES
                 ('$post_content', '$post_date', '$post_thread', '$post_author')";
        $row_count = $dbcon->exec($query);
        return $row_count;

            }
            
     public static function addUser($user)
             {
               $dbcon = Db_connect::getDB();
               $user_name = $user->getUserName();
               $user_pass = $user->getUserPass();
               $user_email = $user->getUserEmail();
               $user_date = $user->getUserDate();
               $user_level = $user->getUserLevel();
               $query =
                "INSERT INTO users
                (user_name, user_pass, user_email, user_date, user_level)
             VALUES
                 ('$user_name', '$user_pass', '$user_email', '$user_date', '$user_level')";
        $row_count = $dbcon->exec($query);
        return $row_count;
                       
             }
}


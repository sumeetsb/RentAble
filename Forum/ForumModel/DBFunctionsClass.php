<?php
require_once 'DBconnect.php';
require_once 'PostClass.php';
require_once 'CategoryClass.php';
require_once 'ThreadClass.php';
class DBFunctionsClass 
{
    //Add Category
    public static function addCategory($category) {
        $dbcon = Db_connect::getDB();
//        $cat_id = $category->getCategoryId();
        $cat_name = $category->getCategoryName();
        $cat_description = $category->getCategoryDescription();
        $query =
            "INSERT INTO forum_categories
                 (cat_name, cat_description)
             VALUES
                 ('$cat_name', '$cat_description')";
        $row_count = $dbcon->exec($query);
        return $row_count;
    }
    
    //Get all categories
     public static function getCategories() {
        $dbcon = Db_connect::getDB();
        $query = "SELECT * FROM forum_categories";
        $result = $dbcon->query($query);
        $result->setFetchMode(PDO::FETCH_OBJ);
        return $result;
    }
    
    //Add thread
    public static function addThread($thread) {
        $dbcon = Db_connect::getDB();
//        $cat_id = $category->getCategoryId();
        $thread_subject = $thread->getThreadSubject();
        $thread_date = $thread->getThreadDate();
        $thread_category = $thread->getThreadCategory();
        $thread_author = $thread->getThreadAuthor();
        
        $query =
            "INSERT INTO forum_threads
                 (thread_subject, thread_date, thread_cat, thread_by)
             VALUES
                 ('$thread_subject', '$thread_date', '$thread_category', '$thread_author')";
        $row_count = $dbcon->exec($query);
        return $row_count;
    }
    
    //Add post
    public static function addPost($post)
            {
                $dbcon = Db_connect::getDB();
                $post_thread = $post->getPostThread();
                $post_author = $post->getPostAuthor();
                $post_content = $post->getPostContent();
                $post_date = $post->getPostDate();
                
                $query =
            "INSERT INTO forum_posts
                 (post_content, post_date, post_thread, post_by)
             VALUES
                 ('$post_content', '$post_date', '$post_thread', '$post_author')";
        $row_count = $dbcon->exec($query);
        return $row_count;

            }
            

            
            public static function getSingleCategory($cat_id)
            {
            $dbcon = Db_connect::getDB();
            $query = "SELECT * FROM forum_categories WHERE cat_id = $cat_id";
            $result = $dbcon->query($query);
            $result->setFetchMode(PDO::FETCH_OBJ);
            return $result;
   
            }
            
            public static function getThreadsByCategory($thread_category)
                    {
            $dbcon = Db_connect::getDB();
            $query = "SELECT * FROM forum_threads WHERE thread_cat = $thread_category";
            $result = $dbcon->query($query);
            $result->setFetchMode(PDO::FETCH_OBJ);
            return $result;
                    }
            
            public static function  getPosts($thread_category)
                    {
            $dbcon = Db_connect::getDB();
            $query = "SELECT * FROM forum_posts WHERE post_thread = $thread_category";
            $result = $dbcon->query($query);
            $result->setFetchMode(PDO::FETCH_OBJ);
            return $result;
                    }
                    
}















//     public static function addUser($user)
//             {
//               $dbcon = Db_connect::getDB();
//               $user_name = $user->getUserName();
//               $user_pass = $user->getUserPass();
//               $user_email = $user->getUserEmail();
//               $user_date = $user->getUserDate();
//               $user_level = $user->getUserLevel();
//               $query =
//                "INSERT INTO users
//                (user_name, user_pass, user_email, user_date, user_level)
//             VALUES
//                 ('$user_name', '$user_pass', '$user_email', '$user_date', '$user_level')";
//        $row_count = $dbcon->exec($query);
//        return $row_count;
//                       
//             }


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
            
            public static function getSingleThread($thread_id)
                    {
            $dbcon = Db_connect::getDB();
            $query = "SELECT * FROM forum_threads WHERE thread_id = $thread_id";
            $result = $dbcon->query($query);
            $result->setFetchMode(PDO::FETCH_OBJ);
            return $result;
                    }
                    
            public static function getSinglePost($post_id)
                    {
            $dbcon = Db_connect::getDB();
            $query = "SELECT * FROM forum_posts WHERE post_id = $post_id";
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
                    
            public static function getAllThreads()
                    {
                $dbcon = Db_connect::getDB();
            $query = "SELECT * FROM forum_threads";
            $result = $dbcon->query($query);
            $result->setFetchMode(PDO::FETCH_OBJ);
            return $result;
                    }
            
            public static function  getPosts($thread_category)
                    {
            $dbcon = Db_connect::getDB();
            $query = "SELECT forum_posts.post_id, forum_posts.post_thread, forum_posts.post_content, forum_posts.post_date,
                     forum_posts.post_by, users.id, users.first_name FROM forum_posts
                     LEFT JOIN
                     users ON  forum_posts.post_by = users.id  WHERE post_thread = $thread_category";
            $result = $dbcon->query($query);
            $result->setFetchMode(PDO::FETCH_OBJ);
            return $result;
                    }
            
             //Delete      
            public static function deleteCategory($cat_id) {
            $dbcon = Db_connect::getDB();
            $query = "DELETE FROM forum_categories
                  WHERE cat_id = '$cat_id'";
            $row_count = $dbcon->exec($query);
            return $row_count;
    }
          public static function deleteThread($thread_id) {
            $dbcon = Db_connect::getDB();
            $query = "DELETE FROM forum_threads
                  WHERE thread_id = '$thread_id'";
            $row_count = $dbcon->exec($query);
            return $row_count;
    }
          public static function deletePost($post_id) {
            $dbcon = Db_connect::getDB();
            $query = "DELETE FROM forum_posts
                  WHERE post_id = '$post_id'";
            $row_count = $dbcon->exec($query);
            return $row_count;
    }
    
    //Update Category
    public static function updateCategory($category, $cat_id) {
        $dbcon = Db_connect::getDB();
        $cat_name = $category->getCategoryName();
        $cat_description =  $category->getCategoryDescription();
        $query =
            "UPDATE forum_categories
             SET  cat_name='".$cat_name."', cat_description='".$cat_description."' WHERE cat_id='".$cat_id."' ";
        $row_count = $dbcon->exec($query);
        return $row_count;
    }
    
    //Update Thread
     public static function updateThread($thread, $thread_id) {
        $dbcon = Db_connect::getDB();
        $thread_subject = $thread-> getThreadSubject();
        $thread_category = $thread->getThreadCategory();
        $thread_author = $thread->getThreadAuthor();
        $thread_date = $thread->getThreadDate();
        $query =
            "UPDATE forum_threads
             SET  thread_subject='".$thread_subject."',"
                . " thread_date='".$thread_date."', thread_cat='".$thread_category."',"
                . " thread_by='".$thread_author."' WHERE thread_id='".$thread_id."' ";
        $row_count = $dbcon->exec($query);
        return $row_count;
    }
    
    //Update Post
     public static function updatePost($post, $post_id) {
        $dbcon = Db_connect::getDB();
        $post_thread =  $post->getPostThread();
        $post_author =  $post->getPostAuthor();                    
        $post_content =  $post->getPostContent();
        $post_date =  $post->getPostDate();
        $query =
            "UPDATE forum_posts
             SET  post_content='".$post_content."', post_date='".$post_date."',"
                . " post_thread='".$post_thread."', post_by='".$post_author."'"
                . " WHERE post_id='".$post_id."' ";
        $row_count = $dbcon->exec($query);
        return $row_count;
    }
                    
}
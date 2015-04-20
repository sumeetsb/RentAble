<?php
require_once ('../../model/config.php');
require_once '../ForumModel/DBconnect.php';
require_once '../ForumModel/ThreadClass.php';
require_once '../ForumModel/PostClass.php';
require_once '../ForumModel/DBFunctionsClass.php';
require_once ('../../view/header.php');
?>
<!DOCTYPE html>
<html>
    <head>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <link rel="stylesheet" href="../forum.css">
        <title></title>
    </head>
    <body>
 <?php
    if($_SERVER['REQUEST_METHOD'] != 'POST')
    {   
                echo '<form method="post" action="">
                    Subject: <input type="text" name="thread_subject" /><br /><br />
                    Category:   '; 
                $resultForCategories = DBFunctionsClass::getCategories();
                echo '<select name="thread_cat">';
                    foreach($resultForCategories as $row)
                    {
                        echo '<option value="' . $row->cat_id . '">' . $row->cat_name . '</option>';
                    }
                echo '</select>'; 
                     
//                echo 'Message: <textarea name="post_content" /></textarea>
                 echo '<br /><br /><input type="submit" value="Create thread" />
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
    }
?>
  </body>
</html>

            
        
    
           
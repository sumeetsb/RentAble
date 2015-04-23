<?php
require_once ('../../model/config.php');
require_once '../../Model/ForumModel/DBconnect.php';
require_once '../../Model/ForumModel/ThreadClass.php';
require_once '../../Model/ForumModel/PostClass.php';
require_once '../../Model/ForumModel/DBFunctionsClass.php';
require_once ('../../view/header.php');
?>
<!DOCTYPE html>
<html>
    <head>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
         <link rel="stylesheet" type="text/css" href="../../css/main.css" />
           <link rel="stylesheet" href="../../css/forum.css">
        <title></title>
    </head>
    <body>
 <?php
                echo '<form method="post" action="../ForumController/execThreadInsert.php">
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
                 echo '<br /><br /><input type="submit" name="insert" value="Create thread" />
                 </form>';
                include ('../../view/footer.php'); 
                 if(isset($errors))
        {
        foreach ($errors as $er)
            {
            echo '<p class="error">'.$er.'</p>';
            }
        }

?>
  </body>
</html>

            
        
    
           
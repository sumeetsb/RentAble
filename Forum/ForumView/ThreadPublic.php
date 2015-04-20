<?php
require_once ('../../model/config.php');
require_once ('../../view/header.php');
require_once '../ForumModel/DBFunctionsClass.php';
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
$result = DBFunctionsClass::getPosts($_GET['id']);
echo '<table class="table-bordered" id="index_class">
                      <tr>
                        <th>Author</th>
                        <th>Message</th>
                      </tr>'; 
foreach ($result as $row)
    {
     echo '<tr>';
        echo '<td>';
        echo $row->first_name."<br />".$row->post_date;
                        echo '</td>';
                        echo '<td>';
                            echo $row->post_content;
                        echo '</td>';
                    echo '</tr>';
                    
   
    
    }
    echo '</table>';
    echo  '<form method="post" action="CreatePost.php?id='.$_GET['id'].'">';
    echo '<input type="submit" class="btn btn-primary btn-lg" value="Add Message" />';
    echo '</form>';
   
    

include ('../../view/footer.php'); 


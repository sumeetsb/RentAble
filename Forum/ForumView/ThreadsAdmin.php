<?php
require_once ('../../model/config.php');
require_once ('../../view/header.php');
require_once '../../Model/ForumModel/DBFunctionsClass.php';
?>
<!DOCTYPE html>
<html>
    <head>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
            <link rel="stylesheet" href="../../css/forum.css">
        <title></title>
    </head>
    <body>
 <?php
  if(isset($_SESSION['admin'])){
 //Execute Delete
 if (isset($_POST['action'])){
        $post_id = $_POST['post_id'];
        DBFunctionsClass::deletePost($post_id);
        }
$result = DBFunctionsClass::getPosts($_GET['id']);
echo '<table class="table-bordered" id="index_class">
                      <tr>
                        <th>Author</th>
                        <th>Message</th>
                         <th>Update</th>
                           <th>Delete</th>
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
                        //Update
      echo "<td><form action='updatePost.php' method='post' id='update_post'>";
      echo "<input type='hidden' name='post_id' value='".$row->post_id."' />";
      echo "<button id='edit' name='edit' class='btn btn-info'>Edit</button></form></td>";
      //Delete
      echo "<td><form action='ThreadsAdmin.php?id=".$_GET['id']."' method='post' id='delete_post'>";
      echo "<input type='hidden' name='action' value='delete_post' />";
      echo "<input type='hidden' name='post_id' value='".$row->post_id."' />";
      echo "<button id='edit' name='edit' class='btn btn-danger'>Delete</button></form></td></tr>";
                    echo '</tr>';
                    
   
    
    }
    echo '</table>';
    echo  '<form method="post" action="CreatePost.php?id='.$_GET['id'].'">';
    echo '<input type="submit" class="btn btn-primary btn-lg" value="Add Message" />';
    echo '</form>';
   
     }else {echo "You do not have permission";}

include ('../../view/footer.php'); 


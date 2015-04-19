<?php
require_once ('../../model/config.php');
require_once ('../../view/header.php');
require_once '../ForumModel/DBFunctionsClass.php';

$result = DBFunctionsClass::getPosts($_GET['id']);
echo '<table border="1">
                      <tr>
                        <th>Author</th>
                        <th>Message</th>
                      </tr>'; 
foreach ($result as $row)
    {
     echo '<tr>';
        echo '<td>';
        echo $row->post_by."<br />".$row->post_date;
                        echo '</td>';
                        echo '<td>';
                            echo $row->post_content;
                        echo '</td>';
                    echo '</tr>';
                    
   
    
    }
    echo '</table>';
    echo  '<form method="post" action="CreatePost.php?id='.$_GET['id'].'">';
    echo '<input type="submit" value="Add Message" />';
    echo '</form>';
   
    

include ('../../view/footer.php'); 


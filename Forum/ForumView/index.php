<?php
require_once ('../../model/config.php');
require_once '../ForumModel/DBconnect.php';
require_once '../ForumModel/CategoryClass.php';
require_once '../ForumModel/DBFunctionsClass.php';
require_once ('../../view/header.php'); 

  
$result = DBFunctionsClass::getCategories();
if($result == null)
{
    echo 'The categories could not be displayed, please try again later.';
}
else
{
    //prepare the table
    echo '<table border="1">
              <tr>
                <th>Category</th>
                <th>Last Thread</th>
              </tr>'; 
             
    foreach ($result as $row)
        {               
            echo '<tr>';
                echo '<td class="leftpart">';
                    echo '<h3><a href="category.php?id='.$row->cat_id.'">' . $row->cat_name . '</a></h3>' . $row->cat_description;
                echo '</td>';
//                echo '<td class="rightpart">';
//                            echo '<a href="thread.php?id=''">Thread subject</a> at 10-10';
//                echo '</td>';
            echo '</tr>';
        }
        include ('../../view/footer.php'); 

    }


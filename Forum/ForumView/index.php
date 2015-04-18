<?php
include '../ForumModel/DBconnect.php';
include '../ForumModel/CategoryClass.php';
include '../ForumModel/DBFunctionsClass.php';
include ('../../view/header.php'); 

  
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
                <th>Last topic</th>
              </tr>'; 
             
    foreach ($result as $row)
        {               
            echo '<tr>';
                echo '<td class="leftpart">';
                    echo '<h3><a href="category.php?id">' . $row->cat_name . '</a></h3>' . $row->cat_description;
                echo '</td>';
                echo '<td class="rightpart">';
                            echo '<a href="topic.php?id=">Topic subject</a> at 10-10';
                echo '</td>';
            echo '</tr>';
        }
        include ('../../view/footer.php'); 

    }


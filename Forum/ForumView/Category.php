<?php
require_once ('../../model/config.php');
require_once ('../../view/header.php');
require_once '../ForumModel/DBFunctionsClass.php';

//first select the category based on $_GET['cat_id']
$result = DBFunctionsClass::getSingleCategory($_GET['id']);
 
if(!$result)
{
    echo 'The category could not be displayed, please try again later.' . mysql_error();
}
else
{
        //display category data
        foreach ($result as $row)
        {
            echo '<h2>Topics in ′' . $row->cat_name . '′ category</h2>';
        }
     
        //do a query for the topics
      
        $result = DBFunctionsClass::getThreadsByCategory($_GET['id']);

        if(!$result)
        {
            echo 'The topics could not be displayed, please try again later.';
        }
        else
        {
                //prepare the table
                echo '<table border="1">
                      <tr>
                        <th>Topic</th>
                        <th>Created at</th>
                      </tr>'; 
                     
                foreach($result as $row)
                {               
                    echo '<tr>';
                        echo '<td class="leftpart">';
                            echo '<h3><a href="thread.php?id=' . $row->thread_id . '">' . $row->thread_subject . '</a><h3>';
                        echo '</td>';
                        echo '<td class="rightpart">';
                            echo date('d-m-Y', strtotime($row->thread_date));
                        echo '</td>';
                    echo '</tr>';
                }
            }
        }
include ('../../view/footer.php'); 
?>



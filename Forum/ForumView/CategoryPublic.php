
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
         <link rel="stylesheet" type="text/css" href="../../css/main.css" />
    <link rel="stylesheet" href="../../css/forum.css">
    <title></title>
    </head>
    <body>
 <?php

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
            echo '<h2>Threads in ' . $row->cat_name . '</h2>';
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
                echo '<table class="table-bordered" id="index_class">
                      <tr>
                        <th>Topic</th>
                        <th>Created at</th>
                      </tr>'; 
                     
                foreach($result as $row)
                {               
                    echo '<tr>';
                        echo '<td>';
                            echo '<h3><a href="threadpublic.php?id=' . $row->thread_id . '">' . $row->thread_subject . '</a><h3>';
                        echo '</td>';
                        echo '<td>';
                            echo date('d-m-Y', strtotime($row->thread_date));
                        echo '</td>';
                    echo '</tr>';
                }
                echo '</table>';
            }
        }

include ('../../view/footer.php'); 
?>        
    </body>
</html>




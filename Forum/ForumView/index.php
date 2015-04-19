<?php
require_once ('../../model/config.php');
require_once '../ForumModel/DBconnect.php';
require_once '../ForumModel/CategoryClass.php';
require_once '../ForumModel/DBFunctionsClass.php';
require_once ('../../view/header.php'); 
?>
<!DOCTYPE html>
<html>
    <head>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <link rel="stylesheet" href="../CSS.css">
        <title></title>
    </head>
    <body>
 <?php
$result = DBFunctionsClass::getCategories();
if($result == null)
{
    echo 'The categories could not be displayed, please try again later.';
}
else
{
    echo "<h1 class='main'>RentAble Forum</h1>";
    //prepare the table
    echo '<table class="table-striped">
              <tr>
                <th><b>Categories: </b></th>
                <th><b>Last Thread</b></th>
              </tr><tbody>'; 
             
    foreach ($result as $row)
        {               
            echo '<tr>';
                echo '<td class="index_class">';
                    echo '<h3><a href="category.php?id='.$row->cat_id.'">' . $row->cat_name . '</a></h3>' . $row->cat_description;
                echo '</td>';
//                echo '<td class="rightpart">';
//                            echo '<a href="thread.php?id=''">Thread subject</a> at 10-10';
//                echo '</td>';
            echo '</tr>';
        }
        echo '</tbody></table>';
        include ('../../view/footer.php'); 

    }
    ?>
        </body>
</html>


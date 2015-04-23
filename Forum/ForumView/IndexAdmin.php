<?php
require_once ('../../model/config.php');
require_once '../../Model/ForumModel/DBconnect.php';
require_once '../../Model/ForumModel/CategoryClass.php';
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
 if(isset($_SESSION['admin'])){
 //Execute Delete
 if (isset($_POST['action'])){
        $cat_id = $_POST['cat_id'];
        DBFunctionsClass::deleteCategory($cat_id);
        }

$result = DBFunctionsClass::getCategories();
if($result == null)
{
    echo 'The categories could not be displayed, please try again later.';
}
else
{
    echo "<h1 class='main'>RentAble Forum-Manage Categories</h1>";
    echo '<a href="CreateCategoryAdmin.php">Create New Category</a>';
    echo '<table class="table-striped">
              <tr>
                <th><b>Categories: </b></th>
                <th>Update</th>
                <th>Delete</th>
              </tr><tbody>'; 
             
    foreach ($result as $row)
        {               
            echo '<tr>';
                echo '<td class="index_class">';
                    echo '<h3><a href="categoryadmin.php?id='.$row->cat_id.'">' . $row->cat_name . '</a></h3>' . $row->cat_description;
                echo '</td>';
      //Update
      echo "<td><form action='updateCategory.php' method='post' id='update_category'>";
      echo "<input type='hidden' name='cat_id' value='".$row->cat_id."' />";
      echo "<button id='edit' name='edit' class='btn btn-info'>Edit</button></form></td>";
      //Delete
      echo "<td><form action='IndexAdmin.php' method='post' id='delete_category'>";
      echo "<input type='hidden' name='action' value='delete_category' />";
      echo "<input type='hidden' name='cat_id' value='".$row->cat_id."' />";
      echo "<button id='edit' name='edit' class='btn btn-danger'>Delete</button></form></td></tr>";
            echo '</tr>';
        }
        echo '</tbody></table>';
        include ('../../view/footer.php'); 

    }
     }else {echo "You do not have permission";}

    ?>
        </body>
</html>


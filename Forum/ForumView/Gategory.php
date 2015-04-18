<?php
//create_cat.php
include '../ForumModel/DBconnect.php';
include '../ForumModel/CategoryClass.php';
include '../ForumModel/DBFunctionsClass.php';
include ('../../view/header.php'); 


if($_SERVER['REQUEST_METHOD'] != 'POST')
{
    //the form hasn't been posted yet, display it
    echo "<form method='post' action=''>
        Category name: <input type='text' name='cat_name' />
        Category description: <textarea name='cat_description' /></textarea>
        <input type='submit' value='Create category' />
     </form>";
    include ('../../view/footer.php'); 

}
else
{
    $cat_name = $_POST["cat_name"];
    $cat_description = $_POST["cat_description"];
    $category = new categoryClass($cat_name, $cat_description);
    $result = DBFunctionsClass::addCategory($category);     
}
?>


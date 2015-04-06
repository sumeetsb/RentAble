<link rel="stylesheet" type="text/css" href="../css/gallery.css" />
<?php
require ('../model/gallery_db.php');
require ('../model/propimage.php');
require ('../model/db_connect.php');


if (isset($_POST['action'])){
        if ($_POST['action']=='delete_img'){
            $img_id=$_POST['img_id'];
            Gallery_db::deleteImage($img_id);
            }
        if ($_POST['action']=='insert' && !empty($_FILES['fileToUpload']['tmp_name'])){
            $target_dir = "images/";
            $img_path="../images/".strtolower($_FILES['fileToUpload']['name']);
            move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $img_path);
            $p_id = $_POST['p_id'];
            $newimage = new propimage($p_id, $img_path);
            Gallery_db::addImage($newimage);
            $errorcomment="";
            }
        if ($_POST['action']=='insert' && empty($_FILES['fileToUpload']['tmp_name'])){
            $errorcomment="select a file";
            }
        }        
$images = Gallery_db::getAllimages();
$prop_idlist=Gallery_db::getPropIds();

?>
<?php
include('../view/header.php');

?>
<link rel="stylesheet" type="text/css" href="../css/gallery.css" />

<table id='g_admin'>
    <tr>
        <td>Property Id</td>
        <td>Image</td>
        <td>Option</td>
    </tr>
    <form action='index.php' method='post' enctype="multipart/form-data">
    <tr>
        <td>
            <select name="p_id">
            <?php foreach ($prop_idlist as $pid) {
                echo "<option value=".$pid[0]." >".$pid[0]."</option>";
            } ?>
            </select>
        </td>                
        <td>
            <input type="file" name="fileToUpload" id="fileToUpload">
            <p id='file_error'><?php echo $errorcomment ?></p>
        </td>
        <td>
            <input type='hidden' name='action' value='insert' /> 
            <input type='submit' name='submit' value='Upload Image' /></td>
    </tr>
    </form>
    
    <?php foreach ($images as $im): ?>
        <tr>
            <form action='index.php' method='post'>
                <td><?php echo $im[1]?></td>
                <td>
                    <div class='thumb' style='background-image: url("<?php echo $im[2] ?>");' ></div>
                </td>       
                <td>
                    <input type='submit' value='Delete' />
                    <input type='hidden' name='action' value='delete_img' />
                    <input type='hidden' name='img_id' value='<?php echo$im[0]?>'>
                </td>
            </form>    
            
    <?php endforeach; ?>
</table>



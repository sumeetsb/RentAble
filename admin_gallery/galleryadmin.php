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
        if ($_POST['action']=='insert'){
            $target_dir = "images/";
            $img_path="../images/".strtolower($_FILES['fileToUpload']['name']);
            move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $img_path);
            $p_id = $_POST['p_id'];
            $newimage = new propimage($p_id, $img_path);
            Gallery_db::addImage($newimage);
            $errorcomment=" ";
            }
        }        
$images = Gallery_db::getAllimages();
?>
<?php
include('../view/header.php');

?>
<table>
    <tr>
        <td>Property Id</td>
        <td>Image</td>
        <td>Option</td>
    </tr>
    <form action='galleryadmin.php' method='post' enctype="multipart/form-data">
    <tr>
        <td>
            <input type='text' name='p_id'/>
        </td>                
        <td>
            <input type="file" name="fileToUpload" id="fileToUpload">           
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
<p><?php $errorcomment ?></p>


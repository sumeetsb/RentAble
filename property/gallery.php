<?php
require ('../model/gallery_db.php');
require ('../model/propimage.php');
?>

<link rel="stylesheet" type="text/css" href="../css/gallery.css" />

<?php
    // getting all images from the database based on property id
    $p_id='$propid';
    $gal_images = Gallery_db::getImagesbyId($p_id);
    if (isset($gal_images)){
        $get_fimages = Gallery_db::getImagesbyId($p_id);
        $allimages=[];
        foreach ($get_fimages as $gal_image){array_push($allimages, $gal_image[2]);
        }
        // setting the large image to selected image or to the first image
        if (isset($_POST['image_url'])){
            $bigimage_url=$_POST['image_url'];
            }
        else {$bigimage_url=$allimages[0];}
    }
    if (!isset($allimages[0])){
        $bigimage_url="../images/Image-Coming-Soon-Placeholder.png";
    }
?>
    
<?php foreach ($gal_images as $gal_image): ?>

<!--showing thumbnails of images-->
<form action='index.php?propid=<?php echo $propid?>' method='post'>
    <button type ='submit' class='thumb' style='background-image: url("<?php echo $gal_image[2]?>")' >
    </button>
    <input type='hidden' name='image_url' value='<?php echo $gal_image[2]?>'>
    </form>
<?php endforeach?>
<!-- div for large image -->
<div class='largeimg' style='background-image: url("<?php echo $bigimage_url ?>");' ></div>

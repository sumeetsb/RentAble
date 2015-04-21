<?php
include '../view/header.php';
?>
<h1><?php echo $prop_name; ?> - Manage Property</h1>

<form action="index.php?update_propid=<?php echo $propid; ?>" method="post">
    <table>    
        <tr>
            <td>Property Name: </td>
            <td><input type="text" id="name" name="name" value="<?php echo $prop_name; ?>" /></td>
        </tr>
        <tr>
            <td>Street: </td>
            <td><input type="text" id="street" name="street" value="<?php echo $street; ?>" /></td>
        </tr>
        <tr>
            <td>Postal Code: </td>
            <td><input type="text" id="postal" name="postal" value="<?php echo $postal; ?>"/></td>
        </tr>
        <tr>
            <td>City: </td>
            <td><input type="text" id="city" name="city" value="<?php echo $city; ?>" /></td>
        </tr>
        <tr>
            <td>Province: </td>
            <td><select id="province" name="province">
                    <option></option>
                <?php foreach($provinces as $p){
                    if($p == $province){
                        echo '<option value="'.$p.'" selected>'.$p.'</option>';
                    } else {
                        echo '<option value="'.$p.'">'.$p.'</option>';
                    }
                }?>
                </select></td>
        </tr>
        <tr>
            <td>Latitude (to 6 decimal places): </td>
            <td><input type="text" id="latitude" name="latitude" value="<?php echo $latitude; ?>" /></td>
        </tr>
        <tr>
            <td>Longitude (to 6 decimal places): </td>
            <td><input type="text" id="longitude" name="longitude" value="<?php echo $longitude; ?>" /></td>
        </tr>
    </table>
    <input type="submit" name="update" value="Update Property" />
    
</form>
<form action="index.php?update_propid=<?php echo $propid; ?>" method="post">
    <input type="submit" name="delete" value="Delete Property" onclick="return confirm('Are you sure you would like to delete this property?');" />
</form>
<p><a href="<?php echo ROOT; ?>property/?propid=<?php echo $propid; ?>">Back</a></p>

<ul class="errors">
    <?php
    foreach($errors as $err){
        echo '<li>' . $err . '</li>';
    }
    ?>
</ul>

<?php

//include '../view/footer.php';


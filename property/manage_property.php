<?php
include '../view/header.php';
?>
<h1><?php echo $p_name; ?> - Manage Property</h1>

<form action="index.php?update_propid=<?php echo $propid; ?>" method="post">
    <table>    
        <tr>
            <td>Property Name: </td>
            <td><input type="text" id="name" name="name" value="<?php echo $p_name; ?>" /></td>
        </tr>
        <tr>
            <td>Street: </td>
            <td><input type="text" id="street" name="street" value="<?php echo $p_street; ?>" /></td>
        </tr>
        <tr>
            <td>Postal Code: </td>
            <td><input type="text" id="postal" name="postal" value="<?php echo $p_postal; ?>"/></td>
        </tr>
        <tr>
            <td>City: </td>
            <td><input type="text" id="city" name="city" value="<?php echo $p_city; ?>" /></td>
        </tr>
        <tr>
            <td>Province: </td>
            <td><select id="province" name="province">
                    <option></option>
                <?php foreach($provinces as $p){
                    if($p == $p_province){
                        echo '<option value="'.$p.'" selected>'.$p.'</option>';
                    } else {
                        echo '<option value="'.$p.'">'.$p.'</option>';
                    }
                }?>
                </select></td>
        </tr>
        <tr>
            <td>Latitude (to 6 decimal places): </td>
            <td><input type="text" id="latitude" name="latitude" value="<?php echo $p_lat; ?>" /></td>
        </tr>
        <tr>
            <td>Longitude (to 6 decimal places): </td>
            <td><input type="text" id="longitude" name="longitude" value="<?php echo $p_long; ?>" /></td>
        </tr>
    </table>
    <input type="submit" name="update" value="Update Property" />
    <p><a href="<?php echo ROOT; ?>property/?propid=<?php echo $propid; ?>">Back</a></p>
    
</form>

<ul class="errors">
    <?php
    foreach($errors as $err){
        echo '<li>' . $err . '</li>';
    }
    ?>
</ul>

<?php

include '../view/footer.php';


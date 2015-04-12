<?php


include('../view/header.php');

?>

<h1>Register a property</h1>

<form action="index.php" method="post">
    
    <table class="reg_form">
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
            <td colspan="2"><p>The following data is required to allow users to see where your property is located on a map.</p></td>
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
    <input type="submit" name="register" value="Register Property" />
    
    
</form>
<ul class="errors">
    <?php
    foreach($errors as $err){
        echo '<li>' . $err . '</li>';
    }
    ?>
</ul>

<?php

include('../view/footer.php');

?>

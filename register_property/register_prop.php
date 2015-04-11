<?php

include('../view/header.php');

?>

<h1>Register a property</h1>

<form action="index.php" method="post">
    
    <table>
        <tr>
            <td>Property Name: </td>
            <td><input type="text" id="name" name="name" /></td>
        </tr>
        <tr>
            <td>Street: </td>
            <td><input type="text" id="street" name="street" /></td>
        </tr>
        <tr>
            <td>City: </td>
            <td><input type="text" id="city" name="city" /></td>
        </tr>
        <tr>
            <td>Province: </td>
            <td><select id="province" name="province">
                    <option></option>
                <?php foreach($provinces as $p){
                    echo '<option value="'.$p.'">'.$p.'</option>';
                }?>
                </select></td>
        </tr>
        <tr>
            <td colspan="2">The following data is required to allow users to see where your property is located on a map.</td>
        </tr>
        <tr>
            <td>Latitude (to 6 decimal places): </td>
            <td><input type="text" id="latitude" name="latitude" /></td>
        </tr>
        <tr>
            <td>Longitude (to 6 decimal places): </td>
            <td><input type="text" id="longitude" name="longitude" /></td>
        </tr>
    </table>
    <input type="submit" name="register" value="Register Property" />
    
    
</form>


<?php

include('../view/footer.php');

?>

<?php

include('../view/header.php');

?>

<h1>Register a property</h1>

<form action="index.php" method="post">
    
    <table>
        <tr>
            <td><label>Property Name: </td>
            <td><input type="text" name="name" /></label</td>
        </tr>
        <tr>
            <td>Street: </td>
            <td><input type="text" name="street" /></td>
        </tr>
        <tr>
            <td>City: </td>
            <td><input type="text" name="city" /></td>
        </tr>
        <tr>
            <td>Province: </td>
            <td><input type="text" name="province" />
        </tr>
        <tr>
            <td colspan="2">The following data is required to allow users to see where your property is located on a map.</td>
        </tr>
        <tr>
            <td>Latitude (to 6 decimal places): </td>
            <td><input type="text" name="latitude" /></td>
        </tr>
        <tr>
            <td>Longitude (to 6 decimal places): </td>
            <td><input type="text" name="longitude" /></td>
        </tr>
    </table>
    
    
</form>


<?php

include('../view/footer.php');

?>

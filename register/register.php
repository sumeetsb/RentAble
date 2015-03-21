<?php

include('../view/header.php');
?>

<div id="regiser">
    <form action="index.php" method="post">
        <table>
            <tr>
                <th colspan="2"><h2>Register</h2></th>
            </tr>
            <tr>
                <td>First Name:</td>
                <td><input type="text" name="fname" /></td>
            </tr>
            <tr>
                <td>Last Name:</td>
                <td><input type="text" name="lname" /></td>
            </tr>
            <tr>
                <td>Enter Birth Date (M/D/Y):</td>
                <td>
                    <select name="month">
                        
                    </select>/
                    <select name="day">
                        
                    </select>/
                    <select name="year">
                        
                    </select>
                </td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><input type="text" name="email" /></td>
            </tr>
            <tr>
                <td>Phone:</td>
                <td><input type="text" name="phone" /></td>
            </tr>
            <tr>
                <td>Username:</td>
                <td><input type="text" name="uname" /></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><input type="password" name="pass" /></td>
            </tr>
            <tr>
                <td>Re-enter Password:</td>
                <td><input type="password" name="pass2" /></td>
            </tr>
            <tr>
                <td>Are you registering as a Landlord?</td>
                <td><input type="checkbox" name="role" /> Yes</td>
            </tr>
            
        </table>
    </form>
</div>


<?php
include('../view/footer.php');
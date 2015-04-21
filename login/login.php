<?php

$cssArray[] = "login.css";
include('../view/header.php');
?>
<div id="login">
    
    <form action="index.php" method="post">
        <table>
            <tr>
                <td colspan="2"><h2>Please log in</h2></td>
            </tr>
            <tr>
                <td>Username: </td>
                <td><input type="text" name="user" /></td>
            </tr>
            <tr>
                <td>Password: </td>
                <td><input type="password" name="pass" /></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="login" value="Login" /></td>
            </tr>
        </table>
    </form>
</div>
<?php 
    if(isset($error)){
        echo '<p class="error">'. $error . '</p>';
    }
?>

<?php

//include('../view/footer.php');

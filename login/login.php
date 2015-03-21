<?php

$cssArray[] = "login.css";
include('../view/header.php');
?>
<div id="login">
    <h2>Please log in</h2>
    <form action="index.php" method="post">
        Username: <input type="text" name="user" /><br />
        Password: <input type="password" name="pass" /><br />
        <input type="submit" name="login" value="Login" />
    </form>
</div>
<?php 
    if(isset($error)){
        echo '<p class="error">'. $error . '</p>';
    }
?>

<?php

include('../view/footer.php');

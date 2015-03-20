<?php

include('../view/header.php');

?>
<h2>Please log in</h2>
<form action="index.php" method="post">
    <input type="text" name="user" /><br />
    <input type="password" name="pass" /><br />
    <input type="submit" name="login" value="Login" />
</form>

<?php

include('../view/footer.php');

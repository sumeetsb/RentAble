<?php
require_once('../model/config.php');
$cssArray[] = "user_dash.css";
include('../view/header.php');
include('alert.php');

include('user_menu.php');

?>

<div id="props">
<?php

///SHOW properties of user

include('props.php');
?>
</div>


<?php

include('../view/footer.php');

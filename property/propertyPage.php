<?php
include('../view/header.php');

?>

<h2>Property: <?php echo $p_name; ?></h2>
<p>Address: <?php echo $p_street . ", " . $p_city . ", " . $p_province; ?></p>


<?php
include('../view/footer.php');
?>
<?php
include('../view/header.php');

include('menu.php');
?>

<h2>Property: <?php echo $p_name; ?></h2>
<p>Address: <?php echo $p_street . ", " . $p_city . ", " . $p_province; ?></p>

<table>
    <?php
    foreach($getSublets as $sublet){
        echo '<th>Available Sublet</th>';
        echo '<tr><td>'.$sublet->getDescription().'<td></tr>';
        echo '<tr><td>'.$sublet->getrentAmount().'<td></tr>';
        echo '<tr><td>'.$sublet->getstartDate().'<td></tr>';
        echo '<tr><td>'.$sublet->getendDate().'<td></tr>';
    }
    ?>
</table>

<a href="<?php echo ROOT; ?>TenantApplication/?propid=<?php echo $propid; ?>">Make an Application</a><br />
<?php
include('gallery.php');
?>
<?php
include('../view/footer.php');
?>
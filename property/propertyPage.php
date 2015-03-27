<?php
include('../view/header.php');
?>

<h2>Property: <?php echo $p_name; ?></h2>
<p>Address: <?php echo $p_street . ", " . $p_city . ", " . $p_province; ?></p>

<table>
    <?php
    foreach($getSublets as $sublet){
        echo '<th>Sublet</th>';
        echo '<tr><td>'.$sublet->getDescription().'<td></tr>';
        echo '<tr><td>'.$sublet->getrentAmount().'<td></tr>';
        echo '<tr><td>'.$sublet->getstartDate().'<td></tr>';
        echo '<tr><td>'.$sublet->getendDate().'<td></tr>';
    }
    ?>
</table>

<?php
include('../view/footer.php');
?>
<?php
include('../view/header.php');
if(isset($_SESSION['role'])){
    include('menu.php');
}
?>

<h1>Property: <?php echo $p_name; ?></h1>
<p>Address: <?php echo $p_street . ", " . $p_city . ", " . $p_province; ?></p>

<?php
include('gallery.php');
?>

    <?php
    foreach($getSublets as $sublet){
        echo '<table><tr><th>Available Sublets</th></tr>';
        echo '<tr><td>'.$sublet->getDescription().'<td></tr>';
        echo '<tr><td>'.$sublet->getrentAmount().'<td></tr>';
        echo '<tr><td>'.$sublet->getstartDate().'<td></tr>';
        echo '<tr><td>'.$sublet->getendDate().'<td></tr></table>';
        echo '<p><a href="'.ROOT.'Sublet/SubletPublic.php?pid='.$propid.'">Apply</a></p>';
    }
    ?>
</table>

<?php

/* Show All current Sublets
 *Craig Veenstra
 */

require_once '../model/config.php';
include "../model/subletDB.php";

?>

<h1>Available Sublets</h1>

<?php
$allsublets = subletDB::getSublets();

foreach($allsublets as $sublet){
    echo "<table><tr><td>" . $sublet['info'] . "</td></tr>";
}


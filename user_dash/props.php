<?php

?>

<nav>
    <h2>Properties List</h2>
    <ul>
        <?php
            if(!empty($_SESSION['props']) && $_SESSION['role'] == 'tenant'){
                $props = $_SESSION['props'];
                foreach($props as $prop){
                    $p = PropertiesClass::getPropertyById($prop);
                    echo '<li><a href="'.ROOT.'property/?propid='.$prop.'">'. $p->getName() . '</a> - <a href="'. ROOT. 'Sublet/index.php?pid='.$prop.'">Create Sublet</a> - <a href="'.ROOT.'Sublet/UpdateSublet.php?pid='.$prop.'">Update Sublet</a> - <a href="'.ROOT.'Sublet/allApplications.php?pid='.$prop.'">View Applications</a></li>';
                }
            } else if (!empty($_SESSION['props']) && $_SESSION['role'] == 'landlord'){
                $props = $_SESSION['props'];
                foreach($props as $prop){
                    $p = PropertiesClass::getPropertyById($prop);
                    echo '<li><a href="'.ROOT.'property/?propid='.$prop.'">'. $p->getName() . '</a></li>';
                }
            }
        ?>
    </ul>
</nav>
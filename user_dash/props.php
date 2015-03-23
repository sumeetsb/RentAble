<?php

?>

<nav>
    <h3>Properties</h3>
    <ul>
        <?php
            if(!empty($_SESSION['props']) && $_SESSION['role'] == 'tenant'){
                $props = $_SESSION['props'];
                foreach($props as $prop){
                    $p = PropertiesClass::getPropertyById($prop);
                    echo '<li>' . $p->getName() . ' - <a href="'. ROOT. 'Sublet/index.php?pid='.$prop.'">Sublet</a></li>';
                }
            } else if (!empty($_SESSION['props']) && $_SESSION['role'] == 'landlord'){
                $props = $_SESSION['props'];
                foreach($props as $prop){
                    $p = PropertiesClass::getPropertyById($prop);
                    echo '<li>' . $p->getName() . '</li>';
            }
            }
        ?>
    </ul>
</nav>
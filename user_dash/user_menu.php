<?php

?>

<nav>
    <h3>Properties</h3>
    <ul>
        <?php
            if(!empty($_SESSION['props'])){
                $props = $_SESSION['props'];
                foreach($props as $prop){
                    $p = PropertiesClass::getPropertyById($prop);
                    echo '<li>' . $p->getName() . ' - <a href="'. ROOT. 'Sublet/index.php?pid='.$prop.'">Sublet</a>';
                }
            }
        ?>
    </ul>
</nav>
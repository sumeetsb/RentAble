<?php

?>

<nav>
    <ul>
        <?php
            if(!empty($_SESSION['props'])){
                $props = $_SESSION['props'];
                foreach($props as $prop){
                    echo '<li>' . $prop . ' <a href="'. ROOT. 'Sublet?pid='.$prop.'">Sublet</a>';
                }
            }
        ?>
    </ul>
</nav>
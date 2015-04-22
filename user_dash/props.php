<?php

?>

<nav>
    <?php if(!empty($_SESSION['props'])){ ?>
    <h2>Properties List</h2>
    <?php } ?>
    <ul>
        <?php
            if(!empty($_SESSION['props']) && $_SESSION['role'] == 'tenant'){
                $props = $_SESSION['props'];
                foreach($props as $prop){
                    $p = PropertiesClass::getPropertyById($prop);
                    echo '<table><tr><th><a href="'.ROOT.'property/?propid='.$prop.'">'. $p->getName() . '</a></th></tr>';
                    echo '<tr><td> - <a href="'. ROOT. 'Sublet/index.php?pid='.$prop.'">Create Sublet Posting</a></td></tr>';
                    echo '<tr><td> - <a href="'.ROOT.'Sublet/UpdateSublet.php?pid='.$prop.'">Update or Delete Sublet Post</a></td>';
                    echo '</tr><tr><td> - <a href="'.ROOT.'Sublet/allApplications.php?pid='.$prop.'">View Sublet Applications</a></td></tr></table>';
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
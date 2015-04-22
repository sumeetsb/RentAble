<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>RentAble</title>
        <link href='http://fonts.googleapis.com/css?family=Roboto+Slab' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="<?php echo ROOT; ?>css/main.css" />
        <?php
            if(!empty($cssArray)){
                foreach($cssArray as $css){
                    echo '<link rel="stylesheet" type="text/css" href="'.ROOT.'css/'.$css.'" />';
                    echo "\n";
                }
            }
        ?>
    </head>
    <body>
        <header>
            <div id="adminLog">
                <?php include('adminlog.php'); ?>
            </div>
            <div id="headerlog">
                <?php include('loginreg.php'); ?>
                
            </div>
            <a href="<?php echo ROOT; ?>"><img id="logo" src="<?php echo ROOT;?>images/RentAble_HeaderLogo_197x62px.png" alt="RentAble" height="62" width="197"></a>
            
        </header>
        <div id="mainNav">
                    <nav>
                        <ul>
                            <li><a href="<?php echo ROOT; ?>Forum/ForumView">Forums</a></li>
                            <li><a href="<?php echo ROOT; ?>Map/MapView/map.php">Rentals Map</a></li>
                            <li><a href="<?php echo ROOT;?>LandlordDirectory">Landlord Directory</a></li>
                            <li><a href="<?php echo ROOT;?>FAQ">FAQ</a></li>
                        </ul>
                    </nav>
                </div>
        <?php include 'adminMenu.php'; ?>
        
        <div class="wrapper">
            
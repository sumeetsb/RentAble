<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>RentAble</title>
        <link href='http://fonts.googleapis.com/css?family=Roboto+Slab' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="<?php echo ROOT; ?>css/main.css" />
        <script src="<?php echo ROOT; ?>js/jquery-1.11.2.min.js"></script>
<script src="../js/jquery-ui.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo ROOT; ?>css/jquery-ui.theme.min.css" />
<script>
  $(function() {
    $( ".datepicker" ).datepicker();
  });
  </script>
  
        <?php
            if(!empty($cssArray)){
                foreach($cssArray as $css){
                    echo '<link rel="stylesheet" type="text/css" href="'.ROOT.'css/'.$css.'" />';
                    echo "\n";
                }
            }
        ?>
  <script type="text/javascript" src="<?php echo ROOT; ?>js/menu.js" ></script>
    </head>
    <body>
        <header>
            <div id="headerID">
                <div id="adminLog">
                    <?php include('adminlog.php'); ?>
                </div>

                <a href="<?php echo ROOT; ?>"><img id="logo" src="<?php echo ROOT;?>images/RentAble.svg" alt="RentAble" height="93" width="165"></a>
            </div>
            <div id="hamburg">
                <p>Menu</p>
            </div>
            <div id="allMenus">
            <div id="headerlog">
                <?php include('loginreg.php'); ?>
                
            </div>
        
            <div id="mainNav">
                <nav>
                    <ul>
                        <li><a href="<?php echo ROOT;?>Forum/ForumView">Forums</a></li>
                        <li><a href="<?php echo ROOT;?>Map/MapView/map.php">Rentals Map</a></li>
                        <li><a href="<?php echo ROOT;?>find_a_friend">Find A Roommate</a></li>
                        <li><a href="<?php echo ROOT;?>LandlordDirectory">Landlord Directory</a></li>
                        <li><a href="<?php echo ROOT;?>FAQ">FAQ</a></li>
                    </ul>
                </nav>
            </div>
        <?php include 'adminMenu.php'; ?>
            </div>
        </header>
        <div class="wrapper">
            
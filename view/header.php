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
                <a href="<?php echo ROOT;?>FAQ">FAQ</a>
                <?php include('loginreg.php'); ?>
            </div>
            <a href="<?php echo ROOT; ?>"><img id="logo" src="<?php echo ROOT;?>images/RentAble_HeaderLogo_197x62px.png" alt="RentAble" height="62" width="197"></a>
            
        </header>
        <div id="wrapper">
            <?php include 'adminMenu.php'; ?>
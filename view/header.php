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
            <img id="logo" src="<?php echo ROOT;?>images/RentAble_HeaderLogo_197x62px.png" alt="RentAble" height="62" width="197">
            <nav>
                <ul>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Sign up</a></li>
                    <li><a href="#">Log in</a></li>
                    <li><a href="#">FAQ</a></li>                 
                </ul>
            </nav>
            
        </header>
        <div id="wrapper">
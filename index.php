<?php
    require_once('model/config.php');
    $cssArray[] = "search.css";
    if(isset($_GET["logout"])){
            if($_GET["logout"] == "true"){
                $logout = $_GET["logout"];
                session_destroy();
                header("Location: index.php");
                exit();
            }
        }
        
    include ('view/header.php');
?>
        
        <h1>Renting Made Easy</h1>

<?php

    include ('search/index.php');
    include ('view/footer.php');
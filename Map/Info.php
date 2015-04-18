<?php require_once ('db_connect.php');
include ('../view/header.php');?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
         <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    </head>
    <body>
        
        <?php
    
        
        //Get full info about the property
        require_once 'db_connect.php';
        require_once 'propertiesClass.php';
        $result = PropertiesClass::getMarker($_GET['id']);
        ?>
       
        <?php
      foreach ($result as $row){     
        
        
      echo '<h2>' . $name = $row->name .'</h2>';
      echo "<br />";
      echo '<b>Street: </b>' . $street = $row->street;
      echo "<br />";
      echo '<b>Postal: </b>' . $postal = $row->postal_code;
      echo "<br />";
      echo '<b>City: </b>' . $city = $row->city;
      echo "<br />";
      echo '<b>Province: </b>' . $province = $row->province;
      echo "<br />";
      echo '<b>Type:</b>' . $type = $row->type;
      echo "<br />";
        }
        include ('../view/footer.php');
        ?>
    </body>
</html>

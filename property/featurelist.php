<?php
require ('../model/features.php');
 $propid=$_GET['propid'];
        //get the features and display with foreach 
        $displayfeature=feature::GetFeaturesByID($propid);
        
?>
 <?php echo "<p>Features: </ps>"; ?>
   
        <?php foreach ($displayfeature as $dis ):  ?>
      
       
        <p><?php echo $dis['features']; ?></p>
        
        

      <?php endforeach; ?>
      

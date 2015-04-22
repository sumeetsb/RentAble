<?php
require ('../model/features.php');
 $propid=$_GET['propid'];
        //get the features and display with foreach 
        $displayfeature=feature::GetFeaturesByID($propid);
        
?>
   
        <?php foreach ($displayfeature as $dis ):  ?>
      
        <?php echo "<p>Features: </ps>"; ?>
        <p><?php echo $dis['features']; ?></p>
        
        

      <?php endforeach; ?>
      

<?php

require("../model/config.php");
require('../model/faf.php');

 if(isset($_SESSION['id'])){
    

    $id = $_SESSION['id'];
    
    $infomation= findfriend::getUser($id);
    
    
    
    if(isset ($_POST['submit']))
    {
       $employment=$_POST['employment'];
       $gender=$_POST['gender'];
       $smoker=$_POST['smoker'];
       $pets=$_POST['pets'];
       
        $update= findfriend::updateUser($id, $employment, $gender, $smoker, $pets);
         header('location: ../user_dash/index.php');
  
        
    }
    
    
    
?>



<html>
    <head>
    <title>Update Profile</title>    
    </head>

<body>
      <?php include('../view/header.php'); ?>
 
   
    
 <?php foreach ($infomation as $info ):  ?>
      
     
        <p>Name: <?php echo $info['first_name']; ?> <?php echo $info['last_name'];  ?></p></td>

        <p>Username: <?php echo $info['user_name']; ?></p>
       <p>Email: <?php echo $info['email']; ?></p>
       <p>Age: <?php echo $info['age']?></p>
      <p></p>

      <?php endforeach; ?>
    
    
    <form action="editprofile.php" method="post">
        Gender:
        <select name="gender">
            <option value="<?php 'NULL' ?>" >SELECT</option>
            <option value="female">Female</option>
            <option value="male">Male</option>
        </select><br/>
       
        Smoker:
        <select name="smoker">
            <option value="<?php NULL ?>" >SELECT</option>
            <option value="yes">Yes</option>
            <option value="no">No</option>
        </select><br/>
        Employment:
        <select name="employment">
            <option value="<?php NULL?>">SELECT</option>
            <option value="student">Student</option>
            <option value="part-time">Part Time</option>
            <option value="full-time">Full Time</option>
        </select><br/>
        Pets:
        <select name="pets">
            <option value="<?php NULL?>">SELECT</option>
            <option value="yes">Yes</option>
            <option value="no">No</option>
        </select><br/>
        
        <input type="submit" name="submit" value="Update"/>
        
    </form>
    
     
    
    
    <?php
    } else {
         header("Location: ../login");
    }

 include('../view/footer.php'); ?>
    
    
</body>

</html>
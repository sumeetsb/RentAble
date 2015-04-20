<?php

require("../model/config.php");
require_once('../model/faf.php');

$error="";
$output="";


//inputs

$gender="";
$employment="";
$smoke ="";
$pet="";


if(isset($_POST['search']))
{
   //gender
   if(isset($_POST['gender']))
   {
   $gender= $_POST['gender'];
   
   }
   else{
        $gender= null;
   }
  
   //employment
   if(isset($_POST['employment']))
   {
   $employment= $_POST['employment'];
   
   }
   else{
        $employment= null;
   }
   
   //smoke
   if(isset($_POST['smoke']))
   {
   $smoke= $_POST['smoke'];
   
   }
   else{
        $smoke= null;
   }
    //pet
   if(isset($_POST['pet']))
   {
   $pet= $_POST['pet'];
   
   }
   else{
        $pet= null;
   }
   
   
   $search=findfriend::searchFriend($gender, $employment, $smoke, $pet);
    
    //if the search comes up empty return erro message, else return finding

        
        
         if(!empty($search))
            {
             foreach ($search as $ser)
            
            {
                $fname= $ser['first_name'];
                $lname= $ser['last_name'];
                $email= $ser['email'];
                $age= $ser['age'];
                $Rgender= $ser['gender'];
                $Rsmoker=$ser['smoker'];
                $Remployment= $ser['employment'];
                $Rpets=$ser['pets'];
                
                if(empty($Rgender))
               {
                $Rgender= "No Value";
               }
         
                if(empty($Rsmoker))
               {
                $Rsmoker= "No Value";
               }
         
                if(empty($Remployment))
               {
                $Remployment= "No Value";
               }
                if(empty($Rpets))
               {
                $Rpets= "No Value";
               }
                     
         
                
                $output .='<div>' . $fname . ' ' . $lname . '<br/> ' .
                '<p> Email: ' . $email  . 
                '</p><p>Age: ' . $age .
                
                '</p><p> Gender: ' . $Rgender .
                
                '</p><p> Employment: ' . $Remployment . 
          
                '</p><p> Smoker: ' . $Rsmoker .
                
                '</p><p> Pets: ' . $Rpets .
                '<br/><br/></div>' ; 
            }
         }
         
         else{
             
        $output="No Roommates Found";
        
      
   
   
        
         }
    
    
    
}//end of isset for search


?>

<!DOCTYPE HTML>
    <html>
        <head>
            <title>Find a Friend</title>
        </head>
        <body>
            <?php include('../view/header.php'); ?>
           <form action="find_friend.php" method="post">
             <p>Gender:</p>
            <input type="checkbox" name="gender" value="Female">Female
            <input type="checkbox" name="gender" value="Male">Male
            <p>Employment:</p>
            <input type="checkbox" name="employment" value="Student">Student
            <input type="checkbox" name="employment" value="Part Time">Part Time
            <input type="checkbox" name="employment" value="Full Time">Full Time

            <p>Smoke: </p>
            <input type="radio" name="smoke" value="Yes">Yes
            <input type="radio" name="smoke" value="No">No
            <p>Pet</p>
            <input type="radio" name="pet" value="Yes">Yes
            <input type="radio" name="pet" value="No">No
            <br/>
            <input type="submit" name="search" value="search"/>
            
        
           </form>
        
        
        
        
        <?php echo $output; ?>
              <?php include('../view/footer.php'); ?>
  
 
        </body>
    </html>
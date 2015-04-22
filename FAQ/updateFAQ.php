<?php



require("../model/config.php");
 require('../model/FAQClass.php');
 
 if(isset($_SESSION['admin'])){
        
        
        
        

$FAQ_id= $_POST['FAQ_id'];
$Question=$_POST['Question'];
$Answer=$_POST['Answer'];
$qerror="";
$aerror="";

if(isset($_POST['cancel']))
{
header('location: adminFAQ.php');
}




?>

<html>
  
  <head>
   <title>FAQ- Update</title>
  </head>
  <body>
   
   <?php include('../view/header.php'); ?>
    <form action="updateFAQ.php" method="post" name="Form"> 
        <fieldset>
<h1>update into FAQ</h1>

         
            <input type="hidden" name="FAQ_id" value="<?php echo $FAQ_id ?>"/>

            <p><label>Question:</label>
            <input type="text" name="Question" value="<?php echo $Question?>"/>
            <?php echo $qerror; ?>
            </p>
            
            
            <p><label>Answer:</label>
            <input type="text" name="Answer" value="<?php echo $Answer?>"/>
            <?php echo $aerror ;?>
            
            </p>
            
            <p><input type="submit" name="fupdate" value="update"/>
  <input type="submit" name ="cancel" Value="cancel"/></p>
            

    </form>
            <!-- submit-->
            <?php
 


//IF U hit update validate 
if(isset($_POST['fupdate'])){


$FAQ_id=($_POST['FAQ_id']);
$Question= ($_POST['Question']);
$Answer= ($_POST['Answer']);


//if validate add into database
   //grab database
   
   getFAQ::updateFAQ($FAQ_id,$Question, $Answer);
   header('location: adminFAQ.php');
  

}
?>


   <?php include('../view/footer.php');
   } else {
        header("Location: ../login");
    }

 ?>

  </body>
</html>
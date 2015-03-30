<?php



require_once('FAQPage.php');

 require('model/FAQClass.php');

$FAQ_id= $_POST['FAQ_id'];
$Question=$_POST['Question'];
$Answer=$_POST['Answer'];
$qerror="";
$aerror="";



?>

<html>
  
  <head>
   <title>FAQ- Update</title>
  </head>
  <body>
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
            
            <p><input type="submit" name="fupdate" value="update"/></p>
            

    </form>
            <!-- submit-->
            <?php
 


//IF U hit update validate 
if(isset($_POST['fupdate'])){


if(empty ($_POST['Question'])){
     $qerror= "This is Blank<br/>";
}
   

if(empty ($_POST['Answer'])){
     $aerror= "This is Blank<br/>";
}


//validate copy form values to local variables
$FAQ_id=($_POST['FAQ_id']);
$Question= ($_POST['Question']);
$Answer= ($_POST['Answer']);


//if validate add into database
   //grab database
   
  if(empty($qerror && $aerror)){
   getFAQ::updateFAQ($FAQ_id,$Question, $Answer);
   header('location: adminFAQ.php');
  }

}
?>

  </body>
</html>
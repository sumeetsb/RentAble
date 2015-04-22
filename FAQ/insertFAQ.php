<?php

require('../model/config.php');


 if(isset($_SESSION['admin'])){
        
        
        
        
        
$qerror="";
$aerror="";



if(isset($_POST['submit'])){


if(empty ($_POST['Question'])){
     $qerror= "This is Blank<br/>";
}
   

if(empty ($_POST['Answer'])){
     $aerror= "This is Blank<br/>";
}


//validate copy form values to local variables
$Question= ($_POST['Question']);
$Answer= ($_POST['Answer']);

//if validate add into database
   //grab database
   
   
   if(empty($qerror && $aerror)){
   require_once('../model/FAQClass.php');
   getFAQ::insertFAQ($Question, $Answer);
   header('location: adminFAQ.php');
   }

}

if(isset($_POST['cancel']))
{
header('location: adminFAQ.php');
}





?>

<html>
    <head><title>FAQ- Insert</title></head>
    <body>
      <?php include("../view/header.php"); ?>


<h1>Insert into FAQ</h1>

    <form action="insertFAQ.php" method="post" name="Form"> 
        

            <!--Question-->
            <p><label>Question:</label>
            <input type="input" name="Question"/>
            <?php echo $qerror;?>
            </p>
            
            <!--Answer-->
            <p><label>Answer:</label>
            <input type="input" name="Answer"/>
            <?php echo $aerror;?>
        
            </p>
            
            <p><input type="submit" name="submit" value="submit"/>
            <input type="submit" name ="cancel" Value="cancel"/></p>

    </form>
            <!-- submit-->
 <?php include("../view/footer.php");
 
  } else {
        header("Location: ../login");
    }

 

?>
    </body>
</html>
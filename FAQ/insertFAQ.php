<?php


require_once('FAQPage.php');


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
   require_once('model/FAQClass.php');
   getFAQ::insertFAQ($Question, $Answer);
   header('location: adminFAQ.php');
   }

}





?>

<html>
    <head><title>FAQ- Insert</title></head>
    <body>
    <form action="insertFAQ.php" method="post" name="Form"> 
        <fieldset>
<h1>Insert into FAQ</h1>


       
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
            
            <p><input type="submit" name="submit" value="submit"/></p>
            

    </form>
            <!-- submit-->

    </body>
</html>
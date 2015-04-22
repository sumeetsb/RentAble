<?php

$key="";
$error="";
$output="";

$question="";
$answer="";

require('../model/FAQClass.php');
require('../model/config.php');



$displayAll=getFAQ::showResults();


      if(isset($_POST['search'])){
        
        if(empty ($_POST['input'])){
            $error="no input <br/>";
        }
        
        //if validates
        
        $key=$_POST['input'];
        
        if(empty($error)){
        $search= getFAQ::getsearch($key);
        }
        
        if(empty($search))
        {
            $output= "no results";
        }
    else
        {
            if($search->rowCount() > 0)
            {
             foreach ($search as $ser)
            
            {
               $OUTQuestion= $ser['question'];
                 

		$OUTAnswer= $ser['answer'];
                
                $output .=' <h3> Question:' . $OUTQuestion . '</h3><div><p>Answer: ' . $OUTAnswer . '</p></div>' ; 
            }
         }
           
            
        }
        }
        

        
      ?>
      


<html>
    <head>
        <title>FAQ</title>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
       <script src="//code.jquery.com/jquery-1.10.2.js"></script>
       <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

  <script>
    //REFERENCE https://jqueryui.com/accordion/
  $(function() {
   $("#accordion").accordion({
            collapsible: true,
            heightStyle: "content",
            active: false
        });
  });
  </script>
    </head>
    <body>
<?php include("../view/header.php");     ?>  
      <form action="FAQ.php" method="post">
    
        <label for ="question">Got A Question?</label>
        <input type="text" name="input" placeholder="Question?"/>
       
        <input type="submit" name="search" value="Search"/>
        
      </form>
      
    
      <div id="accordion">
	<?php echo $output; ?>
      </div>

      
    <!--  <table>  
    <?php// foreach ($displayAll as $dis ):  ?>
      
      <tr>
        
        <td>
        <p>Question:</p>
        <p><?php// echo $dis['Question']; ?></p></td>
      </tr>
      <tr>
        <td>
        <p>Answer: </p>
       <p> <?php// echo $dis['Answer']; ?></p></td>
      </tr>

      <?php// endforeach; ?>
      </table> 
        -->
        
        
        
  <?php      
include("../view/footer.php");



?>


    </body>
</html>
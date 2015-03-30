<?php

$key="";
$error="";
$output="";

$question="";
$answer="";

require('../model/FAQClass.php');



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
               $OUTQuestion= $ser['Question'];
                 $OUTAnswer= $ser['Answer'];
                
                $output .='<div>' . $OUTQuestion . ' ' . $OUTAnswer . '</div>' ; 
            }
         }
           
            
        }
        }
        

        
      ?>
      


<html>
    <head>
        <title>FAQ</title>
    </head>
    <body>
        
      <form action="index.php" method="post">
    
        <label for ="question">Got A Question?</label>
        <input type="text" name="input" placeholder="Question?"/>
       
        <input type="submit" name="search" value="Search"/>
        
      </form>
      
    
      
        <?php echo $output; ?>
      
      
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
    </body>
</html>
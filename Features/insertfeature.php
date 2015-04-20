<?php


require('../model/config.php');
include ('../view/header.php');

$error="";
$propid="";
$value1="";
$value2="";
$value3="";
$value4="";
$value5="";

$featid="";
include("../model/search.php");


if(isset($_SESSION['role'])){
    if($_SESSION['role'] == "landlord"){
        
        //get the id from the http 
        $propid=$_GET['propid'];
        //get the features and display with foreach 
        $displayfeature=search::GetFeaturesByID($propid);
   
if(isset($_POST['insert']))
{
                
                if(empty ($_POST['input1'])){
                
               $error="This is blank";
                
            }
            else{
                 $value1=($_POST['input1']);
            }
            
             if(empty ($_POST['input2'])){
                 
            }
            else
            {
                $value2=($_POST['input2']);
                
            }
            
             if(empty ($_POST['input3'])){
                 
            }
            else
            {
                $value3=($_POST['input3']);
                
            }
            
             if(empty ($_POST['input4'])){
                 
            }
            else
            {
                $value4=($_POST['input4']);
                
            }
            
            
             if(!empty ($_POST['input5'])){
                 
                $value5=($_POST['input5']);
                
            }
   
  
    
    
    if(empty($error)){
    search::InsertFeatures($propid, $value1, $value2, $value3, $value4, $value5);
    
    }
    
}//end of post insert





?>


<form action="insertfeature.php?propid=<?php echo $propid;?>" method="post" name="insert">
    
    <h1>Insert Features for this property</h1>
    
    <!--Insert features-->
    
    <!-- value 1 -->
    <p><label>Feature 1:  </label>
    <input type="input" name="input1"/><?php echo $error?></p>
    <!-- value 2-->
    <p><label>Feature 2: </label>
    <input type="input" name="input2"/></p>
    <!-- value 3-->
    <p><label>Feature 3: </label>
    <input type="input" name="input3"/></p>
     <!-- value 4-->
     <p><label>Feature 4: </label>
    <input type="input" name="input4"/></p>
     <!-- value 5-->
     <p><label>Feature 5: </label>
    <input type="input" name="input5"/></p>
    
    
    
    
    <input type="submit" name="insert" value="Insert"/>
   
    </form>
    <p><a href="../property/?propid=<?php echo $propid; ?>">Back</a></p>

    
    
    <h3>Features:</h3>
     <table>  
        <?php foreach ($displayfeature as $dis ):  ?>
      
      <tr>
        
        <td>
            <p><?php $dis['id'];?></p>
        
        <p><?php echo $dis['features']; ?></p></td>
            
            <td><form action="insertfeature.php?propid=<?php echo $propid;?>" method="post" id="DelF">
            
            <?php echo $dis['id']; ?>
                <input type="hidden" name="f-id" value="<?php echo $dis['id']; ?>"/>
                <input type="submit" name="delete" value="Delete"  />
            </form></td>
      </tr>
      <?php endforeach; ?>
      </table>  
    
   <?php 
    

if(isset($_POST['delete'])){
    
    $featid=$_POST['f-id'];
    search::DeleteFeature($featid);
    
}?>
    

<?php
   
    }
}//end of session
include ('../view/footer.php');

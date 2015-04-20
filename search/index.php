<?php

 $location="";
   $gym="";
   $pets="";
   $elevator="";
   $utilities="";
   $laundry="";
   $parking="";
   $output="";


if(isset($_POST['search']))
{


   if(isset($_POST['location']))
   {
     $location=($_POST['location']);
   
   }
        
  /*if(isset($_POST['Gym']))
   {
      $gym=($_POST['Gym']);
   
   }
   
   if(isset($_POST['Pets']))
   {
     $pets=($_POST['Pets']);
   }
   
    if(isset($_POST['Elevator']))
   {
     $elevator=($_POST['Elevator']);
   
   }
   
    if(isset($_POST['Utilities']))
   {
    $utilities=($_POST['Utilities']);
   }
  
   if(isset($_POST['Parking']))
   {
       
   $parking=($_POST['Parking']);
   
   }
   
    if(isset($_POST['Laundry']))
   {
       
   $parking=($_POST['Laundry']);
   
   }*/
   

   
     include("model/search.php");
   
        $search=search::SearchProperty ($location, $laundry, $parking, $pets, $gym, $elevator, $utilities);
    
    //if the search comes up empty return erro message, else return finding

        
        
         if($search->rowCount() > 0 )
            {
             foreach($search as $ser)  
            {
                
                $pname=$ser['name'];
                $street=$ser['street'];
                $city=$ser['city'];
                $province=$ser['province'];
                $postal=$ser['postal_code'];
                $features=$ser["features"];
                
                
                
            
                   $output .='<div><p>' . $pname . 
                ' </p><p>Address: ' . $street . ', ' . $city . ', ' .$province . ', ' . $postal .  
                ' </div>'
                
                ; 
                
               }
                     
         }
                
             

        
         
         else{
             
        $output="No Properties Found";
        
         }
   
   
        
         
    
    
    
}//end of isset for search



?>

<article>
        <form action="index.php" method="POST">
            <div id="textbox" >
               <p> <input class="searchbar" type="text" name="location" placeholder=" Location eg: Toronto" >
               <input type="submit" name="search" value="Search" /></p>
               
            <!--    <input type="radio" name="Elevator" value="Elevator" />Elevator
                <input type="radio" name="Gym" value="Gym" />Gym
                 <input type="radio" name="Laundry" value="Laundry" />Laundry 
                  <input type="radio" name="Pets" value="Pets" />Pets
                   <input type="radio" name="Parking" value="Parking" />Parking
                    <input type="radio" name="Utilities" value="Utilities" />Utilities-->
            </div>
            
        </form>
</article>


<article>
        <?php echo $output ; ?>
</article>

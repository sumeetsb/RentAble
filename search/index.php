<?php
include("model/search.php");
 $location="";
   $output="";
   $closest="";




?>
<head>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
       <script src="//code.jquery.com/jquery-1.10.2.js"></script>
       <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
       <script src="js/search.js"></script>
       
</head>
<article>
        <div class="ui-widget">
        <form action="index.php" method="POST">
            <div id="textbox" >
               <p> <input class="searchbar" id="searchinfo" type="text" name="location" placeholder=" Location eg: Toronto" >
               <input type="submit" name="search" value="Search" /></p>
            </div>
            </div>
            
        </form>
</article>
<article>
<?php
if(isset($_POST['search']))
{


   
if(empty ($_POST['location'])){
     $qerror= "This is Blank<br/>";
}
        else{
         $location=($_POST['location']);
 $checkLocation=search::check($location,$closest);
 
        }

    $search=search::SearchProperty ($location);
    //if the search comes up empty return erro message, else return finding

     
        
         if($search)
            {
             foreach($search as $ser)  
            {
                $pid = $ser['id']; //$ser['id']; need search to grab id of property too
                $pname=$ser['name'];
                $street=$ser['street'];
                $city=$ser['city'];
                $province=$ser['province'];
                $postal=$ser['postal_code'];
            
                
                
            
                   $output .='<div><p><a href="'. ROOT .'property/?propid='. $pid .'">' . $pname . 
                ' </a></p><p>Address: ' . $street . ', ' . $city . ', ' .$province . ', ' . $postal .  
                ' </div>'
                
                ; 
                
               }
            
         }
                
             

        
         
         else{
             
        $output="No Properties Found";
        
         }
   
   
        
         
    
    
    
}//end of isset for search

?>
</article>

<article>
        <?php echo $output ; ?>
</article>

<?php

require_once('db_connect.php');


//class 
class findfriend {
    
    
    //search for friend 
    public static function searchFriend( $gender, $employment, $smoke, $pet)
    
{
    $where="";
        //get the connection
       $dbcon =Db_connect::getDB();
        //sql statement
        
        
        if(!empty($gender))
        {
            $where .= "and gender LIKE '%" . $gender . "%'";
        }
        
        if(!empty($employment))
        {
        $where .= "and employment LIKE '%" . $employment . "%'";
        }
        
        if(!empty ($smoke))
        {
        $where .="and smoker LIKE '%" . $smoke . "%'";
        }
        
        if(!empty ($pet))
        {
        $where .="and pets LIKE '%" . $pet . "%' ";
        
        }
        //qeury the sql statement in the database
        $sql="SELECT * FROM users WHERE
        role = 'tenant' $where ";
        
        
        $result = $dbcon->query($sql);
        //return the value
        return $result;
    }
    
    
    public static function getUser($id)
    {
       $dbcon =Db_connect::getDB();
        
        $sql ="SELECT * FROM users WHERE id= '$id' ";
        
        $result= $dbcon->query($sql);
        return $result;
        
    }
        
  
    
    
    public static function updateUser($id, $employment, $gender, $smoker , $pets )
    {
       $dbcon =Db_connect::getDB();
        
        $sql="UPDATE users SET employment='$employment', gender='$gender', smoker='$smoker',pets='$pets' where id='$id' ";
    
        $dbcon->query($sql);
        
        
        
    }
    
}







?>
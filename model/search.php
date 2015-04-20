<?php

require_once('db_connect.php');

//class for search

class search {
    //search for property
    
    public static function SearchProperty($location, $laundry, $parking, $pets, $gym, $elevator, $utilities)
    {
        $in="";
        $where="";
        
    
        //get the connection
        $dbcon=Db_connect::getDB();
        
       /* if(!empty($laundry))
        {
        $where .= "'$laundry' ";
        }
        
        if(!empty($parking))
        {
            $where .=" '$parking' ";
        }
        
        if(!empty($pets))
        {
            $where .=" '$pets' ";
        }
        
        if(!empty($gym))
        {
            $where .=" '$gym' ";
        }
        
        if(!empty($elevator))
        {
            $where .=" '$elevator' ";
        }
       
        if(!empty($utilities))
        {
            $where .=" '$utilities' ";
        }
       
       if (!empty($where))
       {
        $in .="AND features IN ($where )";
       }*/
       
        
        //sql statement
        //search for the everything on the propert
            $sql="SELECT * FROM 
               Properties P
               LEFT OUTER JOIN prop_features o ON ( P.id = o.p_id )
               LEFT OUTER JOIN features f ON (o.f_id = f.id)
               WHERE city LIKE '%" . $location . "%'
               $in
               GROUP BY P.id
               ";
        
        $result = $dbcon->query($sql);
        return $result; 
        
    }
    

  
}
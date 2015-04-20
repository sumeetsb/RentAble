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
    
    //INSERT INTO THE FEATURES
      public static function InsertFeatures($propid, $value1 , $value2, $value3, $value4, $value5){
        
        $dbcon = db_connect::getDB();
        
        $value="";
        $PValue="";
        $insert="";
        
       //first value
              //second value
         if(!empty($value2))
       {
            $value .="INSERT INTO features (features)
        VALUES ( '$value2' );
        INSERT INTO prop_features (p_id, f_id)
       VALUES ('$propid', LAST_INSERT_ID());
       ";
        }
       
       //third value
         if(!empty($value3))
        {
            $value .="INSERT INTO features (features)
        VALUES ( '$value3' );
        INSERT INTO prop_features (p_id, f_id)
       VALUES ('$propid', LAST_INSERT_ID());";
        }
       
       //fourth value 
         if(!empty($value4))
       {
            $value .="INSERT INTO features (features)
        VALUES ( '$value4' );
        INSERT INTO prop_features (p_id, f_id)
       VALUES ('$propid', LAST_INSERT_ID());";}
       
       //fifth value
         if(!empty($value5))
        {
            $value .="INSERT INTO features (features)
        VALUES ( '$value5' );
        INSERT INTO prop_features (p_id, f_id)
       VALUES ('$propid', LAST_INSERT_ID());";
        }
       
        //insert into features if the value is not empty insert, and the insert into prop_feature table
        //where the id for p_id is property id and f_id  is the feature id
        $q= "
        INSERT INTO features (features)
        VALUES ( '$value1' );
        INSERT INTO prop_features (p_id, f_id)
       VALUES ('$propid', LAST_INSERT_ID());
       
       $value
        ";
        $result=$dbcon->exec($q);
        return  $result;
        
    }
    
    public static function GetFeaturesByID($propid)
    {
        //connect to database
        $dbcon=db_connect::getDB();
        
        $q= "SELECT * 
    FROM properties p
    LEFT OUTER JOIN prop_features o ON ( p.id = o.p_id ) 
    LEFT OUTER JOIN features f ON ( o.f_id = f.id )
    WHERE p.id = '$propid'";
        
        $result=$dbcon->query($q);
        return $result; 
        
        
    }
    
    public static function DeleteFeature($featid)
    {
        
        //connect to database
        $dbcon=db_connect::getDB();
        
        $q="DELETE FROM features 
        WHERE id='$featid'";
        
        $result=$dbcon->exec($q);
    }
    
  
    
}
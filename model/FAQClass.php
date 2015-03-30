<?php

require_once("db_connect.php");


//add prepare statement

class getFAQ{
    

    
    public static function getsearch($key){
        $dbcon =Db_connect::getDB();
        
        $sql = " SELECT * FROM FAQ WHERE question LIKE '%" . $key . "%'";
        
        $result=$dbcon->query($sql);
         return $result;
    
    }
    
    
    
   static function getQuestion($Id){
        $dbcon= Db_connect::getDB();
        
        $sql="SELECT * From FAQ WHERE id='$Id'  ";
        
        $result =$dbcon->query($sql);
        
        return $result;
        
    }
    
    
    public static function showResults(){
        $dbcon= Db_connect::getDB();
        
        $sql="SELECT * FROM FAQ";
        $display = $dbcon->query($sql);
        return $display; 
    }
    
    static function insertFAQ($Question, $Answer){
        //get database
        $dbcon= Db_connect::getDB();
        //query to add into the database
        $q= "INSERT INTO FAQ(Question, Answer) VALUES ('$Question', '$Answer')";
        
        $dbcon->exec($q); 
        
    }
    
    static function updateFAQ( $FAQ_id,$Question, $Answer){
        //get database
        $dbcon=Db_connect::getDB();
        
        //query update grab question and naswer update into database
        $q= "UPDATE FAQ SET question='$Question', answer=' $Answer ' where id ='$FAQ_id'";
        $dbcon->exec($q); 
    }
    
    
    
     static function deleteFAQ($FAQ_id){
        
    
        //get database
        $dbcon=Database::getDB();
        
        //qeury to delete selected id
        $q= "DELETE from FAQ WHERE id ='$FAQ_id'";
        
        $dbcon->exec($q);
        
        //header('location: adminFAQ.php');

    }
}




?>

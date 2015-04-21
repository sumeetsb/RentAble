<?php
class categoryClass 
{
//    private $cat_id;
    private $cat_name;
    private $cat_description;
    
    public function __construct($cat_name, $cat_description)
        {
    //Category
//  $this->cat_id = $cat_id;
    $this->cat_name = $cat_name;
    $this->cat_description = $cat_description;
        }
        
    public function getCategoryName(){
    return $this->cat_name;
    }
    
    public function setCategoryName($cat_name){
        $this->cat_name = $cat_name;
    } 
    
    public function getCategoryDescription(){
    return $this->cat_description;
    }
    
    public function setcategoryDescription($cat_description){
        $this->cat_description = $cat_description;
    } 
}

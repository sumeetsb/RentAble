<?php
//Craig Veenstra

require_once('../model/config.php');


//template for objects
class Sublet {
    
    private $u_id;
    private $p_id;
    private $description;
    private $rentAmount;
    private $startDate;
    private $endDate;
    
    //the parameters are taken and assigned into the private variables using $this
    public function __construct($u_id, $p_id, $description, $rentAmount, $startDate, $endDate){
        
        $this->u_id = $u_id;
        $this->p_id = $p_id;
        $this->description = $description;
        $this->rentAmount = $rentAmount;
        $this->startDate = $startDate;
        $this->endDate = $endDate;      
        
    }
    
    public function getu_id(){
        return $this->u_id;
    }
    
    public function setu_id($u_id){
        return $this->u_id = $u_id;
    }
    
    public function getp_id(){
        return $this->p_id;
    }
    
    public function setp_id($p_id){
        return $this->p_id = $p_id;
    }
    
    public function getDescription(){
        //returning the private variable
        return $this->description;
    }
    
    //sets allow to change the current value
    public function setDescription($description){
        //overwriting any previous set values
        $this->description = $description;
    }
    
     public function getrentAmount(){
        //returning the private variable
        return $this->rentAmount;
    }
    
    //sets allow to change the current value
    public function setrentAmount($rentAmount){
        //overwriting any previous set values
        $this->rentAmount = $rentAmount;
    }
    
     public function getstartDate(){
        //returning the private variable
        return $this->startDate;
    }
    
    //sets allow to change the current value
    public function setstartDate($startDate){
        //overwriting any previous set values
        $this->startDate = $startDate;
    }
    
     public function getendDate(){
        //returning the private variable
        return $this->endDate;
    }
    
    //sets allow to change the current value
    public function setendDate($endDate){
        //overwriting any previous set values
        $this->endDate = $endDate;
    }
    
}

?>



<?php

require_once('../model/config.php');


//template for objects
class Apply{
    private $p_id;
    private $u_id;
    private $message;
    private $email;
    
    //the parameters are taken and assigned into the private variables using $this
    public function __construct($p_id, $u_id, $message, $email){
        
        $this->p_id = $p_id;
        $this->u_id = $u_id;
        $this->message = $message;
        $this->email = $email;
        
    }
    
    
    
    public function getp_id(){
        return $this->p_id;
    }
    
    public function setp_id($p_id){
        return $this->p_id = $p_id;
    }
    
    public function getu_id(){
        return $this->u_id;
    }
    
    public function setu_id($u_id){
        return $this->u_id = $u_id;
    }
    
    public function getmessage(){
        return $this->message;
    }
    
    public function setmessage($message){
        return $this->message = $message;
    }
    
    public function getemail(){
        return $this->email;
    }
    
    public function setemail($email){
        return $this->email = $email;
    }
    
}




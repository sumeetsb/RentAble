<?php
//Sumeet Bhullar
class Notice {
    private $id;
    private $p_id;
    private $u_id;
    private $subject;
    private $notice;
    private $date_cre;
    private $expiry;
    
    public function __construct(){
        
    }
    
    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }
    
    public function getPId(){
        return $this->p_id;
    }
    public function setPId($id){
        $this->p_id = $id;
    }
    
    public function getUId(){
        return $this->u_id;
    }
    public function setUId($id){
        $this->u_id = $id;
    }
    
    public function getSubject(){
        return $this->subject;
    }
    public function setSubject($subject){
        $this->subject = $subject;
    }
    
    public function getNotice(){
        return $this->notice;
    }
    public function setNotice($notice){
        $this->notice = $notice;
    }
    
    public function getDateCreated(){
        return $this->date_cre;
    }
    
    public function getExpiry(){
        return $this->expiry;
    }
    public function setExpiry($expiry){
        $this->expiry = $expiry;
    }
}
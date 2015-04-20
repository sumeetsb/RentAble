<?php

class invoiceClass 
{
    private $p_id;
    private $tenant_id;
    private $amount;
    private $date_rec;
    
    public function __construct($p_id, $tenant_id, $amount, $date_rec)
    {
    $this->p_id = $p_id; 
    $this->tenant_id = $tenant_id;
    $this->amount = $amount;
    $this->date_rec = $date_rec;
    }
    
      public function getP_id(){
    return $this->p_id;
    }
    
    public function setP_id($p_id){
        $this->p_id = $p_id;
    } 
    
    
        public function getTenant_id(){
    return $this->tenant_id;
    }
    
    public function setTenant_id($tenant_id){
        $this->tenant_id = $tenant_id;
    } 
    
        public function getamount(){
    return $this->amount;
    }
    
    public function setamount($amount){
        $this->amount = $amount;
    } 
    
        public function getDate(){
    return $this->date_rec;
    }
    
    public function setDate($date_rec){
        $this->date_rec = $date_rec;
    } 
}

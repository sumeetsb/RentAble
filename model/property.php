<?php

class Property{
    private $id;
    private $landlord_id;
    private $name;
    private $street;
    private $postal;
    private $city;
    private $province;
    private $latitude;
    private $longitude;
    private $type;
    
    public function __construct($l_id, $name, $street, $postal, $city, $province, $lat, $long, $type = null){
        $this->landlord_id = $l_id;
        $this->name = $name;
        $this->street = $street;
        $this->postal = $postal;
        $this->city = $city;
        $this->province = $province;
        $this->latitude = $lat;
        $this->longitude = $long;
        $this->type = $type;
    }
    
    public function getId(){
        return $this->id;
    }
    
    public function setId($id){
        $this->id = $id;
    }
    
    public function getLandLordId(){
        return $this->landlord_id;
    }
    
    public function setLandLordId($id){
        $this->landlord_id = $id;
    }
    
    public function getName(){
        return $this->name;
    }
    
    public function setName($name){
        $this->name = $name;
    }
    
    public function getStreet(){
        return $this->street;
    }
    
    public function setStreet($street){
        $this->street = $street; 
    }
    
    public function getPostal(){
        return $this->postal;
    }
    
    public function setPostal($postal){
        $this->postal = $postal;
    }
    
    public function getCity(){
        return $this->city;
    }
    
    public function setCity($city){
        $this->city = $city;
    }
    
    public function getProvince(){
        return $this->province;
    }
    
    public function setProvince($province){
        $this->province = $province;
    }
    
    public function getLatitude(){
        return $this->latitude;
    }
    
    public function setLatitude($lat){
        $this->latitude = $lat;
    }
    
    public function getLongitude(){
        return $this->longitude;
    }
    
    public function setLongitude($long){
        $this->longitude = $long;
    }
    
    public function getType(){
        return $this->type;
    }
    
    public function setType($type){
        $this->type = $type;
    }
}
<?php
//Sumeet Bhullar
class User {
    private $id;
    private $first_name;
    private $last_name;
    private $user_name;
    private $password;
    private $email;
    private $phone;
    private $role;
    private $age;
    private $gender;
    private $smoking_status;
    private $employment;
    private $pets;
    private $properties = array();
    
    public function __construct($fname, $lname, $uname, $pword, $email, $phone, 
            $role, $age, $gender = null, $smoking_status = null, $employment = null,
            $pets = null){
        //$this->id = $id;
        $this->first_name = $fname;
        $this->last_name = $lname;
        $this->user_name = $uname;
        $this->password = $pword;
        $this->email = $email;
        $this->phone = $phone;
        $this->role = $role;
        $this->age = $age;
        $this->gender = $gender;
        $this->smoking_status = $smoking_status;
        $this->employment = $employment;
        $this->pets = $pets;
    }
    
    public function getId(){
        return $this->id;
    }
    
    public function setId($id){
        $this->id = $id;
    }
    
    public function getFname(){
        return $this->first_name;
    }
    
    public function setFname($fname){
        $this->first_name = $fname;
    }
    
    public function getLname(){
        return $this->last_name;
    }
    
    public function setLname($lname){
        $this->last_name = $lname;
    }
    
    public function getUname(){
        return $this->user_name;
    }
    
    public function setUname($uname){
        $this->user_name = $uname;
    }
    
    public function getPword(){
        return $this->password;
    }
    
    public function setPword($pword){
        $this->password = $pword;
    }
    
    public function getEmail(){
        return $this->email;
    }
    
    public function setEmail($email){
        $this->email = $email;
    }
    
    public function getPhone(){
        return $this->phone;
    }
    
    public function setPhone($phone){
        $this->phone = $phone;
    }
    
    public function getRole(){
        return $this->role;
    }
    
    public function setRole($role){
        $this->role = $role;
    }
    
    public function getAge(){
        return $this->age;
    }
    
    public function setAge($age){
        $this->age = $age;
    }
    
    public function getGender(){
        return $this->gender;
    }
    
    public function setGender($gen){
        $this->gender = $gen;
    }
    
    public function getSstatus(){
        return $this->smoking_status;
    }
    
    public function setSstatus($sstatus){
        $this->smoking_status = $sstatus;
    }
    
    public function getEmp(){
        return $this->employment;
    }
    
    public function setEmp($emp){
        $this->employment = $emp;
    }
    
    public function getPets(){
        return $this->pets;
    }
    
    public function setPets($pets){
        $this->pets = $pets;
    }
    
    public function getProperties(){
        return $this->properties;
    }
    
    public function setProperties($props){
        $this->properties = $props;
    }
}

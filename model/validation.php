<?php

class Validation{
    private $formValues = array();
    public $errors = array();
    
    public function __construct() {}
    
    public function todoVal($fname, $fvalue, $valType){
        $arr = array("Name" => $fname, "Value" => $fvalue, "Type" => $valType);
        $this->formValues[] = $arr;
    }
    
    public function validate(){
        foreach ($this->formValues as $val){
            if(strtolower($val['Type']) == "required"){
                if ($this->required($val['Value']) == false){
                    $this->errors[] = "The field " . $val['Name'] . " is required.";
                }
            } else if (strtolower($val['Type']) == "number"){
                if ($this->isNumber($val['Value']) == false){
                    $this->errors[] = "The field " . $val['Name'] . " must be a number.";
                }
            } else if(strtolower($val['Type']) == "postal"){
                if ($this->postal($val['Value']) == false){
                    $this->errors[] = "The field " . $val['Name'] . " must be a valid postal code.";
                }
            } else if (strtolower($val['Type']) == "latitude"){
                if($this->isLat($val['Value']) == false){
                    $this->errors[] = "The field " . $val['Name'] . " must be a decimal number between -90 and 90.";
                }
            } else if (strtolower($val['Type']) == "longitude"){
                if($this->isLong($val['Value']) == false){
                    $this->errors[] = "The field " . $val['Name'] . " must be a decimal number between -180 and 180.";
                }
            } else if (strtolower($val['Type']) == "email"){
                if($this->email($val['Value']) == false) {
                    $this->errors[] = "The field " . $val['Name'] . " must be a valid email format.";
                }
            } else if (strtolower($val['Type']) == "passwords"){
                if($this->passwords($val['Value'][0], $val['Value'][1]) == false){
                    $this->errors[] = $val['Name'] . " fields must match.";
                }
            } else if (strtolower($val['Type']) == "phone"){
                if($this->phone($val['Value']) == false){
                    $this->errors[] = "The field " . $val['Name'] . " must be a valid phone number.";
                }
            }
            
        }
    }
    
    private function required($field){
        if($field == ""){
            return false;
        }else{
            return true;
        }
    }
    
    private function phone($field){
        $phoneregex = "/^\+?[0-9]+(\([0-9]+\))?[0-9-]*[0-9]$/";
        if(!preg_match($phoneregex, $field)){
            return false;
        } else {
            return true;
        }
    }
    
    private function passwords($f1, $f2){
        if($f1 == $f2){
            return true;
        } else {
            return false;
        }
    }
    
    private function email($field){
        if(filter_var($field, FILTER_VALIDATE_EMAIL)){
            return true;
        } else {
            return false;
        }
    }

    private function typeString($field){
        if(!is_string($field)){
            return false;
        }else{
            return true;
        }
    }

    private function isNumber($field){
        if(!is_numeric($field)){
            return false;
        }else{
            return true;
        }
    }
    
    private function postal($field){
        $postalregex = "/^\w\d\w\s*\d\w\d$/";
        if(!preg_match($postalregex, $field)){
            return false;
        } else {
            return true;
        }
    }

    private function isLat($field){
        if(is_numeric($field)){
            if($field > 90 || $field < -90){
                return false;
            }
            $decregex = "/^[-+]?\d*(\.\d+)?$/";
            if(!preg_match($decregex, $field)){
                return false;
            } else {
                return true;
            }
        } else {
            return false;
        }
    }
    
    private function isLong($field){
        if(is_numeric($field)){
            if($field > 180 || $field < -180){
                return false;
            }
            $decregex = "/^[-+]?\d*(\.\d+)?$/";
            if(!preg_match($decregex, $field)){
                return false;
            } else {
                return true;
            }
        } else {
            return false;
        }
    }

}
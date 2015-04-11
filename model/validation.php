<?php

class Validation{
    private $formValues = array();
    private $errors = array();
    
    private function __construct() {}
    
    public function todoVal($fname, $fvalue, $valType){
        $arr = array("Name" => $fname, "Value" => $fvalue, "Type" => $valType);
        $this->formArr[] = $arr;
    }
    
    public function validate(){
        foreach ($this->formValues as $val){
            if(strtolower($val['Type']) == "required"){
                if (!$this->required($val['Value'])){
                    $this->errors[] = $val['Name'] . " is required.";
                }
            } else if (strtolower($val['Type']) == "string"){
                if (!$this->typeString($val['Value'])){
                    $this->errors[] = $val['Name'] . " needs to be a string.";
                }
            } else if (strtolower($val['Type']) == "number"){
                
            } else if (strtolower($val['Type']) == "coord"){
                
            }
            
        }
    }
    
    private function required($field){
        if($field != ""){
            return false;
        }else{
            return true;
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

    private function isCoord($field){
        if(is_float($field)){

            return true;
        }else{
            return false;
        }
    }

}
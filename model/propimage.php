<?php

class propimage {
    private $p_id, $img_path;
    public function __construct($p_id, $img_path) {
        $this->p_id = $p_id;
        $this->img_path = $img_path;
    }
   
    public function getP_Id() {
        return $this->p_id;
    }

    public function getImg_Path() {
        return $this->img_path;
    }

}

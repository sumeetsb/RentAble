<?php

class rating {
    private $raterid, $ratedid, $rate, $comment;
    public function __construct($raterid, $ratedid, $rate, $comment) {
        $this->raterid = $raterid;
        $this->ratedid = $ratedid;
        $this->rate = $rate;
        $this->comment = $comment;
    }
    
    public function getRaterId() {
        return $this->raterid;
    }

    public function getRatedId() {
        return $this->ratedid;
    }

    public function getRate() {
        return $this->rate;
    }

    public function getComment() {
        return $this->comment;
    }

 

}

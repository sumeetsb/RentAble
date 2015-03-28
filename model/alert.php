<?php

class alert {
    private $prop_id, $renter_id, $rent_due, $day_due;
    public function __construct($prop_id, $renter_id, $rent_due, $day_due) {
        $this->prop_id = $prop_id;
        $this->renter_id = $renter_id;
        $this->rent_due = $rent_due;
        $this->day_due = $day_due;
    }
    public function getPropId() {
        return $this->prop_id;
    }
    public function getRenterId() {
        return $this->renter_id;
    }
    public function getRentDue() {
        return $this->rent_due;
    }
    public function getDayDue() {
        return $this->day_due;
    }
}

<?php

class AlertDB {
    // function which gets all alerts by Id using renter Id
    public static function getAlertbyId($renter_id) {
        $dbcon = Db_connect::getDB();
        $query = "SELECT * FROM alerts WHERE renter_id='$renter_id'";
        $result = $dbcon->query($query);
        $result->setFetchMode(PDO::FETCH_NUM);
        return $result;
    }
    // function which gets all alerts from the database
    public static function getAlertsALL() {
        $dbcon = Db_connect::getDB();
        $query = "SELECT * FROM alerts";
        $result = $dbcon->query($query);
        $result->setFetchMode(PDO::FETCH_NUM);
        return $result;
    }
    // function which gets all property Ids from the database
    public static function getPropIds() {
        $dbcon = Db_connect::getDB();
        $query = "SELECT DISTINCT id FROM properties ORDER BY id";
        $result = $dbcon->query($query);
        $result->setFetchMode(PDO::FETCH_NUM);
        return $result;
    }
    // function which gets all renter ids from the database
    public static function getRenterIds() {
        $dbcon = Db_connect::getDB();
        $query = "SELECT DISTINCT id FROM users ORDER BY id";
        $result = $dbcon->query($query);
        $result->setFetchMode(PDO::FETCH_NUM);
        return $result;
    }
    //function which adds alert to the database
    public static function addAlert($newalert) {
        $dbcon = Db_connect::getDB();
        $prop_id = $newalert->getPropId();
        $renter_id = $newalert->getRenterId();
        $rent_due = $newalert->getRentDue();
        $day_due = $newalert->getDayDue();
        $query =
            "INSERT INTO alerts
                 (prop_id,renter_id,rent_due,date_due)
             VALUES
                 ('$prop_id', '$renter_id', '$rent_due', '$day_due')";
        $row_count = $dbcon->exec($query);
        return $row_count;
    }
    //function which updates alert in the database
    public static function updateAlert($newalert,$alert_id) {
        $dbcon = Db_connect::getDB();
        $prop_id = $newalert->getPropId();
        $renter_id = $newalert->getRenterId();
        $rent_due = $newalert->getRentDue();
        $day_due = $newalert->getDayDue();
        $query =
            "UPDATE alerts
                 SET prop_id= '$prop_id', renter_id='$renter_id', rent_due='$rent_due', date_due='$day_due'  WHERE ID = '$alert_id'";
        $row_count = $dbcon->exec($query);
        return $row_count;
    }
    //function which deletes alert from the database
    public static function deleteAlert($alert_id) {
        $dbcon = Db_connect::getDB();
        $query = "DELETE FROM alerts
                  WHERE ID = '$alert_id'";
        $row_count = $dbcon->exec($query);
        return $row_count;
    }
}
?>

<?php
class AlertDB {
	//use category and product class
	//four static method
    public static function getAlertbyId($renter_id) {
        $dbcon = Db_connect::getDB();
        $query = "SELECT * FROM alerts WHERE renter_id='$renter_id'";
        $result = $dbcon->query($query);
        $result->setFetchMode(PDO::FETCH_NUM);
        return $result;
    }
    public static function getAlertsALL() {
        $dbcon = Db_connect::getDB();
        $query = "SELECT * FROM alerts";
        $result = $dbcon->query($query);
        $result->setFetchMode(PDO::FETCH_NUM);
        return $result;
    }
    public static function getPropIds() {
        $dbcon = Db_connect::getDB();
        $query = "SELECT DISTINCT id FROM properties ORDER BY id";
        $result = $dbcon->query($query);
        $result->setFetchMode(PDO::FETCH_NUM);
        return $result;
    }
    public static function getRenterIds() {
        $dbcon = Db_connect::getDB();
        $query = "SELECT DISTINCT id FROM users ORDER BY id";
        $result = $dbcon->query($query);
        $result->setFetchMode(PDO::FETCH_NUM);
        return $result;
    }
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
    public static function deleteAlert($alert_id) {
        $dbcon = Db_connect::getDB();
        $query = "DELETE FROM alerts
                  WHERE ID = '$alert_id'";
        $row_count = $dbcon->exec($query);
        return $row_count;
    }
}
?>

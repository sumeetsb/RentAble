<?php
//Sumeet Bhullar
require_once('db_connect.php');
require_once('notice.php');

class Noticeboard {
    
    public static function getAllNoticesOfProperty($pid){
        $db = Db_connect::getDB();
        
        $q = "SELECT * FROM notices WHERE p_id = :pid";
        $stm = $db->prepare($q);
        $stm->bindParam(":pid", $pid);
        $stm->execute();
        $results = $stm->fetchAll();
        $notices = array();
        foreach ($results as $result){
            $date_cre = new DateTime(date("Y-m-d H:i:s", strtotime($result['date_cre'])), new DateTimeZone('America/Los_Angeles'));
            $date_cre->setTimezone(new DateTimeZone('America/New_York'));
            $notice = new Notice($result['p_id'], $result['u_id'], $result['subject'], $result['notice'], $$date_cre, $result['expiry']);
            $notices[] = $notice;
        }
        return $notices;
    }
}
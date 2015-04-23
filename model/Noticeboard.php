<?php
//Sumeet Bhullar
require_once('db_connect.php');
require_once('notice.php');

class Noticeboard {
    public static function getAllNotices(){
        $db = Db_connect::getDB();
        
        $q = "SELECT * FROM notices";
        $stm = $db->prepare($q);
        $stm->execute();
        $results = $stm->fetchAll();
        $notices = array();
        foreach ($results as $row){
            $date_cre = new DateTime(date("Y-m-d H:i:s", strtotime($row['date_cre'])), new DateTimeZone('America/Los_Angeles'));
            $date_cre->setTimezone(new DateTimeZone('America/New_York'));
            $date = $date_cre->format("Y-m-d H:i:s");
            $notice = new Notice($row['p_id'], $row['u_id'], $row['subject'], $row['notice'], $date, $row['expiry']);
            $notice->setId($row['id']);
            $notices[] = $notice;
        }
        return $notices;
    }
    
    public static function getAllNoticesOfProperty($pid){
        $db = Db_connect::getDB();
        
        $q = "SELECT * FROM notices WHERE p_id = :pid AND (expiry > CURDATE() OR expiry IS NULL) ORDER BY date_cre DESC";
        $stm = $db->prepare($q);
        $stm->bindParam(":pid", $pid);
        $stm->execute();
        $results = $stm->fetchAll();
        $notices = array();
        foreach ($results as $result){
            $date_cre = new DateTime(date("Y-m-d H:i:s", strtotime($result['date_cre'])), new DateTimeZone('America/Los_Angeles'));
            $date_cre->setTimezone(new DateTimeZone('America/New_York'));
            $date = $date_cre->format("Y-m-d H:i:s");
            $notice = new Notice($result['p_id'], $result['u_id'], $result['subject'], $result['notice'], $date, $result['expiry']);
            $notice->setId($result['id']);
            $notices[] = $notice;
        }
        return $notices;
    }
    
    public static function deleteNotice($id){
        $db = Db_connect::getDB();
        $q = "DELETE FROM notices WHERE id = :id";
        $stm = $db->prepare($q);
        $stm->bindParam(":id", $id);
        $stm->execute();
    }
    
    public static function postNotice(Notice $notice){
        $db = Db_connect::getDB();
        $pid = $notice->getPId();
        $uid = $notice->getUId();
        $subject = $notice->getSubject();
        $message = $notice->getNotice();
        $q = "INSERT INTO notices (p_id, u_id, subject, notice) VALUES($pid, $uid, '$subject', '$message')";
        
        $stm = $db->prepare($q);
        $stm->execute();
    }
}
<?php
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
        foreach ($results as $results){
            $notice = new Notice();
            $notices[] = $notice;
        }
        return $notices;
    }
}
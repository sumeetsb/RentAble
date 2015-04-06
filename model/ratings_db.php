<?php
class RatingDB {
	//use category and product class
	//four static method
    public static function getUserIds() {
        $dbcon = Db_connect::getDB();
        $query = "SELECT DISTINCT id FROM users ORDER BY id";
        $result = $dbcon->query($query);
        $result->setFetchMode(PDO::FETCH_NUM);
        return $result;
    }
    public static function GetUsers() {
        $dbcon = Db_connect::getDB();
        $query = "SELECT DISTINCT rated_id FROM user_rating ORDER BY rated_id";
        $result = $dbcon->query($query);
        $result->setFetchMode(PDO::FETCH_NUM);
        return $result;
    }
    public static function getRatingsbyId($rater_id) {
        $dbcon = Db_connect::getDB();
        $query = "SELECT * FROM user_rating WHERE approve_status='1' AND rated_id='$rater_id'";
        $result = $dbcon->query($query);
        $result->setFetchMode(PDO::FETCH_NUM);
        return $result;
    }
    public static function getUserbyId($rater_id) {
        $dbcon = Db_connect::getDB();
        $query = "SELECT * FROM users WHERE id='$rater_id'";
        $result = $dbcon->query($query);
        $result->setFetchMode(PDO::FETCH_NUM);
        return $result;
    }
    public static function getRatingsALL() {
        $dbcon = Db_connect::getDB();
        $query = "SELECT * FROM user_rating ORDER BY approve_status";
        $result = $dbcon->query($query);
        $result->setFetchMode(PDO::FETCH_NUM);
        return $result;
    }
    public static function addRating($newrating) {
        $dbcon = Db_connect::getDB();
        $rrid = $newrating->getRaterId();
        $rdid = $newrating->getRatedId();
        $rate = $newrating->getRate();
        $comment = $newrating->getComment();
        $query =
            "INSERT INTO user_rating
                 (rater_id,rated_id,rating,comment)
             VALUES
                 ('$rrid', '$rdid', '$rate', '$comment')";
        $row_count = $dbcon->exec($query);
        return $row_count;
    }
    public static function updateRating($newrating,$rating_id) {
        $dbcon = Db_connect::getDB();
        $rate = $newrating->getRate();
        $comment = $newrating->getComment();
        $query =
            "UPDATE user_rating
                 SET comment= '$comment', rating='$rate' WHERE ID = '$rating_id'";
        $row_count = $dbcon->exec($query);
        return $row_count;
    }
    public static function deleteRating($rating_id) {
        $dbcon = Db_connect::getDB();
        $query = "DELETE FROM user_rating
                  WHERE ID = '$rating_id'";
        $row_count = $dbcon->exec($query);
        return $row_count;
    }
    public static function approveRating($rating_id) {
        $dbcon = Db_connect::getDB();
        $query = "UPDATE user_rating
        SET approve_status='1' WHERE ID = '$rating_id'";
        $row_count = $dbcon->exec($query);
        return $row_count;
    }
}
?>

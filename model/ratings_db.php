<?php
class RatingDB {
// function which gets user Ids
    public static function getUserIds() {
        $dbcon = Db_connect::getDB();
        $query = "SELECT DISTINCT id FROM users ORDER BY id";
        $result = $dbcon->query($query);
        $result->setFetchMode(PDO::FETCH_NUM);
        return $result;
    }
    //function which gets a list of rated user ids
    public static function GetUsers() {
        $dbcon = Db_connect::getDB();
        $query = "SELECT DISTINCT rated_id FROM user_rating ORDER BY rated_id";
        $result = $dbcon->query($query);
        $result->setFetchMode(PDO::FETCH_NUM);
        return $result;
    }
    //function which gets ratings of the user by his id
    public static function getRatingsbyId($rater_id) {
        $dbcon = Db_connect::getDB();
        $query = "SELECT * FROM user_rating WHERE approve_status='1' AND rated_id='$rater_id'";
        $result = $dbcon->query($query);
        $result->setFetchMode(PDO::FETCH_NUM);
        return $result;
    }
    //function which gets data from user table by user id
    public static function getUserbyId($rater_id) {
        $dbcon = Db_connect::getDB();
        $query = "SELECT * FROM users WHERE id='$rater_id'";
        $result = $dbcon->query($query);
        $result->setFetchMode(PDO::FETCH_NUM);
        return $result;
    }
    //function which gets all user ratings
    public static function getRatingsALL() {
        $dbcon = Db_connect::getDB();
        $query = "SELECT * FROM user_rating ORDER BY approve_status";
        $result = $dbcon->query($query);
        $result->setFetchMode(PDO::FETCH_NUM);
        return $result;
    }
    //function which adds new rating
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
    //function which updates ratings
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
    //function which deletes rating
    public static function deleteRating($rating_id) {
        $dbcon = Db_connect::getDB();
        $query = "DELETE FROM user_rating
                  WHERE ID = '$rating_id'";
        $row_count = $dbcon->exec($query);
        return $row_count;
    }
    //function which changes the approve status of the rating
    public static function approveRating($rating_id) {
        $dbcon = Db_connect::getDB();
        $query = "UPDATE user_rating
        SET approve_status='1' WHERE ID = '$rating_id'";
        $row_count = $dbcon->exec($query);
        return $row_count;
    }
}
?>

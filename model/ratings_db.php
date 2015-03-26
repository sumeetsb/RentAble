<?php
class RatingDB {
	//use category and product class
	//four static method
    public static function GetUsers() {
        $dbcon = Database::getDB();
        $query = "SELECT DISTINCT rated_id FROM ratings ORDER BY rated_id";
        $result = $dbcon->query($query);
        $result->setFetchMode(PDO::FETCH_NUM);
        return $result;
    }
    public static function getRatingsbyId($rater_id) {
        $dbcon = Database::getDB();
        $query = "SELECT * FROM ratings WHERE approve_status='1' AND rated_id='$rater_id'";
        $result = $dbcon->query($query);
        $result->setFetchMode(PDO::FETCH_NUM);
        return $result;
    }
    public static function getRatingsALL() {
        $dbcon = Database::getDB();
        $query = "SELECT * FROM ratings ORDER BY approve_status";
        $result = $dbcon->query($query);
        $result->setFetchMode(PDO::FETCH_NUM);
        return $result;
    }
    public static function addRating($newrating) {
        $dbcon = Database::getDB();
        $rrid = $newrating->getRaterId();
        $rdid = $newrating->getRatedId();
        $rate = $newrating->getRate();
        $comment = $newrating->getComment();
        $query =
            "INSERT INTO ratings
                 (rater_id,rated_id,rating,comment)
             VALUES
                 ('$rrid', '$rdid', '$rate', '$comment')";
        $row_count = $dbcon->exec($query);
        return $row_count;
    }
    public static function updateRating($newrating,$rating_id) {
        $dbcon = Database::getDB();
        $rate = $newrating->getRate();
        $comment = $newrating->getComment();
        $query =
            "UPDATE ratings
                 SET comment= '$comment', rating='$rate' WHERE ID = '$rating_id'";
        $row_count = $dbcon->exec($query);
        return $row_count;
    }
    public static function deleteRating($rating_id) {
        $dbcon = Database::getDB();
        $query = "DELETE FROM ratings
                  WHERE ID = '$rating_id'";
        $row_count = $dbcon->exec($query);
        return $row_count;
    }
    public static function approveRating($rating_id) {
        $dbcon = Database::getDB();
        $query = "UPDATE ratings
        SET approve_status='1' WHERE ID = '$rating_id'";
        $row_count = $dbcon->exec($query);
        return $row_count;
    }
}
?>

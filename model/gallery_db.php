<?php

class Gallery_db {
    //function which gets all images by property id
    public static function getImagesbyId($p_id) {
        $dbcon = Db_connect::getDB();
        $query = "SELECT * FROM prop_images WHERE p_id='$p_id'";
        $result = $dbcon->query($query);
        $result->setFetchMode(PDO::FETCH_NUM);
        return $result;
    }
    //function which gets all images
    public static function getAllimages() {
        $dbcon = Db_connect::getDB();
        $query = "SELECT * FROM prop_images";
        $result = $dbcon->query($query);
        $result->setFetchMode(PDO::FETCH_NUM);
        return $result;
    }
    //function which gets all property ids
    public static function getPropIds() {
        $dbcon = Db_connect::getDB();
        $query = "SELECT DISTINCT id FROM properties ORDER BY id";
        $result = $dbcon->query($query);
        $result->setFetchMode(PDO::FETCH_NUM);
        return $result;
    }
    //function owhich deletes an image
    public static function deleteImage($img_id) {
        $dbcon = Db_connect::getDB();
        $query = "DELETE FROM prop_images
                  WHERE ID = '$img_id'";
        $row_count = $dbcon->exec($query);
        return $row_count;
    }
    //function which adds image do database
    public static function addImage($newimage) {
        $dbcon = Db_connect::getDB();
        $p_id = $newimage->getP_Id();
        $img_path = $newimage->getImg_Path();
        $query =
            "INSERT INTO prop_images
                 (p_id,img_path)
             VALUES
                 ('$p_id', '$img_path')";
        $row_count = $dbcon->exec($query);
        return $row_count;
    }
}

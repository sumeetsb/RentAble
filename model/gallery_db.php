<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of gallery_db
 *
 * @author Charming
 */
class Gallery_db {
    public static function getImagesbyId($p_id) {
        $dbcon = Db_connect::getDB();
        $query = "SELECT * FROM prop_images WHERE p_id='$p_id'";
        $result = $dbcon->query($query);
        $result->setFetchMode(PDO::FETCH_NUM);
        return $result;
    }
    public static function getAllimages() {
        $dbcon = Db_connect::getDB();
        $query = "SELECT * FROM prop_images";
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
    public static function deleteImage($img_id) {
        $dbcon = Db_connect::getDB();
        $query = "DELETE FROM prop_images
                  WHERE ID = '$img_id'";
        $row_count = $dbcon->exec($query);
        return $row_count;
    }
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

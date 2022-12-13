<?php
include "db.class.php";
class tour extends Db
{
    public function addstour($conn, $tourplace, $tourdesc, $tourimage, $newpath, $oldpath)
    {
        move_uploaded_file($oldpath, $newpath);
        $sql = $conn->query("INSERT INTO tours (tour_place, tour_description, tour_image) VALUES ('$tourplace', '$tourdesc', '$tourimage')");
        if ($sql == true) {
            return true;
        } else {
            return false;
        }
    }
    public function updatetour($conn, $tourplace, $tourdesc, $tourimage, $newpath, $oldpath, $id)
    {
        move_uploaded_file($oldpath, $newpath);
        if (empty($tourimage)) {
            $sql = $conn->query("UPDATE tours SET tour_place = '$tourplace', tour_description = '$tourdesc' WHERE id = '$id' ");
        } else {
            $sql = $conn->query("UPDATE tours SET tour_place = '$tourplace', tour_description = '$tourdesc', tour_image = '$tourimage' WHERE id = '$id' ");
        }
        if ($sql == true) {
            return true;
        } else {
            return false;
        }
    }
    public function showtours()
    {
        $connect = new Db;
        $conn = $connect->connection();
        $sql = $conn->query("SELECT * FROM tours");
        return $sql;
    }
    public function showtoursid($id)
    {
        $connect = new Db;
        $conn = $connect->connection();
        $sql = $conn->query("SELECT * FROM tours WHERE id = $id");
        return $sql;
    }
    public function deletetour($id)
    {
        $connect = new Db;
        $conn = $connect->connection();
        $sql = $conn->query("DELETE FROM tours WHERE id = $id");
        return $sql;
    }
}

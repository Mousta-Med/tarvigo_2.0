<?php
include "../models/tour.class.php";


$tourplace = $_POST['name'];
$tourdesc = $_POST['description'];
$tourimage = $_FILES['image']['name'];
$oldpath = $_FILES['image']['tmp_name'];
$newpath = "../public/img/" . $tourimage;
$id = $_GET['id'];

$admin = new tour();
$connect = new Db;
$conn = $connect->connection();
$requet = $admin->updatetour($conn, $tourplace, $tourdesc, $tourimage, $newpath, $oldpath, $id);

if ($requet == true) {
    header("location: ../views/dashboard.php");
} else {
    echo "error";
}

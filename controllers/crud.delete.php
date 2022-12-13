<?php
include "../models/tour.class.php";

$id = $_GET['id'];
$admin = new tour();
$connect = new Db;
$conn = $connect->connection();
$requet = $admin->deletetour($id);

if ($requet == true) {
    header("location: ../views/dashboard.php");
} else {
    echo "error";
}

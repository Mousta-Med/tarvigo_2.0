<?php
include "db.class.php";
$connect = new Db;
$conn = $connect->connection();
session_start();
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = htmlspecialchars(trim(strtolower($_POST['username'])));
    $password = $_POST['password'];
    $sql = "SELECT * FROM admin WHERE admin_username = '$username' AND admin_password = '$password'";
    $result = mysqli_query($conn, $sql);
    echo $password;
    if (mysqli_num_rows($result) > 0) {
        $_SESSION['name'] = $username;
        $_SESSION['password'] = $password;
        header("Location: dashboard.php");
        echo "successfully loged in";
    } else {
        header("location: login.php?error=username or password incorrect");
    }
}

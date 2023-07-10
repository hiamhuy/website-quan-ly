<?php
include_once "connect.php";
if ((isset($_POST['username'])) && (isset($_POST['pass']))) {
    $username = $_POST['username'];
    $pass = $_POST['pass'];

    $query = "SELECT * FROM account WHERE username = '$username' and password = '$pass'";
    $sql = mysqli_query($conn, $query);

    $data = mysqli_fetch_assoc($sql);
    $checkUser = mysqli_num_rows($sql);
    if ($checkUser) {
        header('location:../view/app/home.php');
    } else {
        echo 'sai tài khoản hoặc mật khẩu';
    }

}
?>
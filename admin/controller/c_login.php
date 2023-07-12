<?php
include_once "database.php";
include_once "session.php";
$db = new Database();
if ((isset($_POST['username'])) && (isset($_POST['pass']))) {
    $username = $_POST['username'];
    $pass = $_POST['pass'];

    $where = array(
        "username" => $username,
        "password" => $pass
    );
    $dataGet = $db->Get('account', $where);
    // echo "<pre>";
    // print_r($dataGet);
    if (isset($dataGet)) {
        openSession();
        createSession("data-user", $dataGet);
        header('location:../../index.php');
    } else {
        echo 'sai tài khoản hoặc mật khẩu';
    }

}
?>
<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "hachitechsolution";

$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection error" . $conn->connect_error);
}


function openSession()
{
    if (!isset($_SESSION)) {
        session_start();
    }
}
function closeSession($data)
{
    if (isset($_SESSION['$data' . $data])) {
        unset($_SESSION['$data' . $data]);
    }
}


?>
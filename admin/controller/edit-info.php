<?php
include 'database.php';
include 'session.php';

if (isset($_POST['btn-save'])) {

    openSession();
    $dataSession = getSession("data-user");
    $id = $dataSession['id'];
    $image = $_FILES['avatar']['name'];
    $imagetmp = $_FILES['avatar']['tmp_name'];
    $name = $_POST['name'];

    // $query = "UPDATE account SET name = '$name' WHERE id = '$id'";

    echo $id;
    echo $image . "\n" . $imagetmp . "\n" . $name;

}

?>
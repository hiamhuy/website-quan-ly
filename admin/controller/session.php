<?php
function openSession()
{
    if (!isset($_SESSION)) {
        session_start();
    }
}

function createSession($name, $data)
{
    $_SESSION[$name] = $data;
}
function getSession($name)
{
    $dataSesson = (isset($_SESSION[$name])) ? $_SESSION[$name] : [];
    return $dataSesson;
}
function deleteSession($name)
{
    if (isset($_SESSION[$name])) {
        unset($_SESSION[$name]);
    }
    header('location:../../login.php');
}


?>
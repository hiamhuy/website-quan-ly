<?php
include_once "database.php";
include_once "session.php";
function checkRequestLogin()
{
    $request = $_SERVER['REQUEST_URI'];
    openSession();
    $dataSession = getSession('data-user');

    if ($dataSession != null) {
        switch ($request) {
            case '/':
                header('location:admin/view/app/home.php');
                break;
            case '':
                header('location:admin/view/app/home.php');
                break;
            case http_response_code(404):
                header('location:admin/view/shared/404.php');

            default:
                header('location:admin/view/app/home.php');
                break;
        }
    } else {
        header('location:login.php');
    }
}

?>
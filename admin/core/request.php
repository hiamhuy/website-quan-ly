<?php
include './admin/Controllers/LoginController.php';
class Request
{
    function checkRequestLogin()
    {
        $login = new LoginController();
        $dataSession = getSession('data-user');
        if (!$dataSession) {
            $login->index();
        } else {
            $app = new Admin();
        }
    }
}
?>
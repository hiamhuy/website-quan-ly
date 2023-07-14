<?php
define('_DIR_ROOT', __DIR__);
if (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
    $web_root = 'https://' . $_SERVER['HTTP_HOST'];
} else {
    $web_root = 'http://' . $_SERVER['HTTP_HOST'];
}

$_SERVER['DOCUMENT_ROOT'] = str_replace('/', '\\', $_SERVER['DOCUMENT_ROOT']);
$folder = str_replace(strtolower($_SERVER['DOCUMENT_ROOT']), '', strtolower(_DIR_ROOT));
$web_root = $web_root . $folder;
$web_root = str_replace('\\', '/', $web_root);
define('_WEB_ROOT', $web_root);

include "admin/core/session.php";
openSession();
require_once "admin/configs/config.php";
require_once "admin/core/route.php";
require_once 'admin/admin.php';
require_once 'admin/Controllers/BaseController.php';
require_once 'admin/core/database.php';
require_once 'admin/core/render.php';
require_once 'admin/core/request.php';
$request = new Request();
$request->checkRequestLogin();

?>
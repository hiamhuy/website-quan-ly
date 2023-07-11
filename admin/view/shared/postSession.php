<?php
include '../../controller/session.php';
openSession();
$dataSession = getSession('data-user');
print json_encode($dataSession);
?>
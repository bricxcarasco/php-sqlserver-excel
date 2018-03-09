<?php
$Host = ".\SQLEXPRESS";
$connInfo = array("UID" => 'usernameHere', "PWD" => 'passwordHere', "Database" => 'DatabaseName');
$conn = sqlsrv_connect($Host, $connInfo);
?>

<?php
require_once(realpath(__DIR__ . '/./SessionDatabase_init.php'));
$result=$GLOBALS['session']->check_login($_POST['username'],$_POST['password']);
echo $result;
?>
<?php
require(realpath(__DIR__ . '/../classes/class.User.php'));
require(realpath(__DIR__ . '/../classes/class.Database.php'));

$result=$GLOBALS['user']->checkUser($_GET['q']);
echo $result;


?>



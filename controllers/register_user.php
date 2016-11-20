<?php
require(realpath(__DIR__ . '/../classes/class.User.php'));
require(realpath(__DIR__ . '/../classes/class.Database.php'));


$result=$GLOBALS['user']->createUser($_POST['name'],$_POST['username'],$_POST['password'],$_POST['email']);
echo $result;

?>
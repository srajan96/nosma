<?php
require(realpath(__DIR__ . '/../classes/class.Account.php'));
require_once(realpath(__DIR__ . '/./SessionDatabase_init.php'));

//echo "hello";
$account=new Account();
$account->changePassword($_POST['current_pass'],$_POST['new_pass']);


?>
<?php
require(realpath(__DIR__ . '/../classes/class.Message.php'));
require_once(realpath(__DIR__ . '/./SessionDatabase_init.php'));

//echo "hello";
$message=new Message();
$message->sendMessage($_POST['to_username'],$_POST['msg'],$_POST['type']);


?>
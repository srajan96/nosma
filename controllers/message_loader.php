<?php
require(realpath(__DIR__ . '/../classes/class.Message.php'));
require_once(realpath(__DIR__ . '/./SessionDatabase_init.php'));

//echo "hello";
$message=new Message();
$message->loadMessage($_POST['name'],$_POST['message_id'],$_POST['type']);


?>
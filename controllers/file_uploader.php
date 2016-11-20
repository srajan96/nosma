<?php
require(realpath(__DIR__ . '/../classes/class.Message.php'));
require_once(realpath(__DIR__ . '/./SessionDatabase_init.php'));

//echo "hello";
$message=new Message();
$message->file_uploader($_POST['file_name']);
echo "Don";

?>
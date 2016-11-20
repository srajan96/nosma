<?php
require_once(realpath(__DIR__ . '/./SessionDatabase_init.php'));
require(realpath(__DIR__ . '/../classes/class.History.php'));
	
$history=new History();
$history->viewHistory();

?>
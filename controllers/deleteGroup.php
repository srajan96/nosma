<?php
require_once(realpath(__DIR__ . '/./SessionDatabase_init.php'));
require(realpath(__DIR__ . '/../classes/class.Group.php'));
	

$group=new Group();
$group->deleteGroup($_POST['gid']);



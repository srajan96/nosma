<?php
require(realpath(__DIR__ . '/../classes/class.Group.php'));
require_once(realpath(__DIR__ . '/./SessionDatabase_init.php'));

//echo "hello";
$group=new Group();
$group->listGroups();


?>
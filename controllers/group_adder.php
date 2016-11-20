<?php
require_once(realpath(__DIR__ . '/./SessionDatabase_init.php'));
require(realpath(__DIR__ . '/../classes/class.Group.php'));
	
$name=$_POST['name'];
$members=$_POST['members'];

$group=new Group();
$group->createGroup($name,$members);
//echo $name."\n";
//foreach($members as $member){
//    echo $member."\n";
//}
?>
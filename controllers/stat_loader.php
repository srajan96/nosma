<?php
require_once(realpath(__DIR__ . '/./SessionDatabase_init.php'));

$query="select count(*) from user;";
$user=  mysqli_fetch_assoc(mysqli_query($GLOBALS['database']->conn,$query))['count(*)'];

$query="select count(*) from messages;";
$message=  mysqli_fetch_assoc(mysqli_query($GLOBALS['database']->conn,$query))['count(*)'];

$query="select count(*) from group_info;";
$group=  mysqli_fetch_assoc(mysqli_query($GLOBALS['database']->conn,$query))['count(*)'];

$query="select count(*) from uploads;";
$upload=  mysqli_fetch_assoc(mysqli_query($GLOBALS['database']->conn,$query))['count(*)'];

$array=array('user'=>$user,'message'=>$message,'group'=>$group,'upload'=>$upload);
echo json_encode($array);



/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


<?php
require 'header.inc.php';
$query="insert into users(username,name,email,password) values('".$_POST['username']."','".$_POST['name']."','".$_POST['email']."','".sha1($_POST['password'])."');";
//echo $query;
mysqli_query($GLOBALS["___mysqli_ston"], $query);
echo "Done";
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


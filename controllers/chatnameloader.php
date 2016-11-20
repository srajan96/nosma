<?php
require_once(realpath(__DIR__ . '/./SessionDatabase_init.php'));
$type=$_POST['type'];
$to=$_POST['to'];
if($type=="c")
$query="select name as 'answer' from user where username='$to';";
else
$query="select group_name as 'answer' from group_info where group_id=$to;";    
$res=  mysqli_fetch_assoc(mysqli_query($GLOBALS['database']->conn,$query))['answer'];
echo $res;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


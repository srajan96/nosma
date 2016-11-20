<?php
require_once(realpath(__DIR__ . '/./SessionDatabase_init.php'));
$gid=$_POST['gid'];

$username=$_SESSION['username'];

$query="SELECT * from group_info where group_id=$gid";

//echo $query;
$res=  mysqli_fetch_assoc(mysqli_query($GLOBALS['database']->conn,$query))['admin_username'];

if($res==$username)
    echo "ITS ADMIN";
else
    echo "NOT ADMIN";

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


<?php
require_once(realpath(__DIR__ . '/./SessionDatabase_init.php'));
$gid=$_POST['gid'];
$user=$_SESSION['userid'];
$members=$_POST['members'];


 foreach($members as $member){
                $query="insert into group_users values($gid,'$member');";
                //echo $query;
                  mysqli_query($GLOBALS['database']->conn,$query);
            }
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<?php
require_once(realpath(__DIR__ . '/./SessionDatabase_init.php'));
$members=$_POST['members'];
$user=$_SESSION['userid'];

foreach($members as $member){
    $query="delete from contact where user_id=$user and username='$member'";
    
   if(mysqli_query($GLOBALS['database']->conn,$query)) echo mysqli_error ($GLOBALS['database']->conn);
}



/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


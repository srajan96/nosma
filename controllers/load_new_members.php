<?php
require_once(realpath(__DIR__ . '/./SessionDatabase_init.php'));
$gid=$_POST['gid'];
$user=$_SESSION['userid'];


$query="select u.name,c.username from contact c,user u where c.username=u.username and c.user_id=$user and c.username not in(select username from group_users where group_id=$gid )";
//echo $query;   
$query=  mysqli_query($GLOBALS["database"]->conn,$query);
$userdata=array();

while($result=  mysqli_fetch_assoc($query)){
    $username=$result['username'];
    $name=$result['name'];
    
    $userdata[]=array('username'=>$username,'name'=>$name);
}
echo json_encode($userdata);
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


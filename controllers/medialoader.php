<?php
require_once(realpath(__DIR__ . '/./SessionDatabase_init.php'));
$to=$_POST['to'];
$type=$_POST['type'];
$username=$_SESSION['username'];
if($type=="c"){
    $query="select *from links where link_id in (select note_id from shared_note where from_user_name in ('$username','$to') and to_user_name in ('$username','$to') );";
    
}
else{
     $query="select *from links where link_id in (select note_id from group_notes where group_id=$to); ";
    
}

//echo $query;
$res=  mysqli_query($GLOBALS['database']->conn,$query);

if($res != false)
		{
			$rows = array();
			$i=0;
			while($r = mysqli_fetch_assoc($res)) {
				$rows[$i] = $r;
				$i++;
			}
			echo json_encode($rows);
		}
		else
		{
			echo "";
		}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


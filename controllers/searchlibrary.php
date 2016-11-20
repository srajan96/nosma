<?php
require_once(realpath(__DIR__ . '/./SessionDatabase_init.php'));
$tag=$_POST['term'];
$query = "SELECT * from links where (notename like '%".$tag."%' or tag like '%".$tag."%') and accesstype='public';";//echo $query;
$res=mysqli_query($GLOBALS['database']->conn,$query);

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
?>
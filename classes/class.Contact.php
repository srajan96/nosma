<?php
require_once 'SessionDatabase_init.php';

class Contact
{
    public $username = null;

    public $emailid = null;
    public $mobile = 0;

    public function addContact($username){
	
		$check1=$GLOBALS['user']->checkUser($username);
		$check2=$this->checkContact($username);
		//echo $check2;
		if($check1=="exists"){
				if($check2!="exists"){
					$query="INSERT into contact values(".$_SESSION['userid'].",'".$username."') ;";
					if(mysqli_query($GLOBALS["database"]->conn, $query))
						echo "done";

					else 
						echo "error";	
				}
				else
					echo "present";
				 
		}
		else
			echo "not exists";
		
		
    }
	public function checkContact($user){
		$query="SELECT username from contact where user_id=".$_SESSION['userid']." and username='".$user."';";
		//echo $query;
		$res=mysqli_query($GLOBALS["database"]->conn, $query);
		
		if(mysqli_num_rows($res)){
			return "exists";
		}
		else
			return "not exists";

	}
    public function viewContact()
    {
    }

    public function deleteContact()
    {
    }

    public function modifyContact()
    {
    }
	public function listContacts(){
                $username=$_SESSION['username'];
		$query="SELECT * from user where username in (SELECT username from contact where user_id=".$_SESSION['userid'].") and username!='$username';";
		//echo $query;
                $res=mysqli_query($GLOBALS['database']->conn,$query);
		$rows = array();
                $i=0;
		while($r = mysqli_fetch_assoc($res)) {
			$rows[$i] = $r;
                        $i++;
		}

		echo json_encode($rows);
	}
} /* end of class Contact */

?>
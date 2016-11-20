<?php

class User
{
     // variables
    var $username;
    var $password;
	var $name;
    var $user_id;
    var $email;
	
	
	function User() {
	}
	function createUser($name,$username,$password,$email) {
		$this->name=$name;
		$this->username=$username;
		$this->password=sha1($password);
		$this->email=$email;
    
		$query="insert into user(username,name,email,password) values('".$this->username."','".$this->name."','".$this->email."','".$this->password."');";
		//echo $query;
		if(mysqli_query($GLOBALS["database"]->conn, $query))
			return "registered";

		else 
			return "error"; 
	
	}
	public function checkUser($user){
		$query="SELECT username from user where username='".$user."';";
		//echo $query;
		$res=mysqli_query($GLOBALS["database"]->conn, $query);
		
		if(mysqli_num_rows($res)){
			return "exists";
		}
		else
			return "not exists";

	}

} /* end of class User */
$GLOBALS['user']=new User();
?>
<?php

class Session{   
     static $sessionInstance=null;   
	var $isLoggedIn;
	var $userid;
	 private function Session()
    {
        $this->isLoggedIn=false;
    }
    static function getSession(){
		if(self::$sessionInstance==null)
			self::$sessionInstance=new Session();
		return
			self::$sessionInstance;
	}   
        
	function getLoginBox() {
        ob_start();
		//if(!$this->isLoggedIn)
		
                        require_once(realpath(__DIR__ . '/../login.php'));
        
    }
	function isloggedin(){
    
    $sessid = mysqli_real_escape_string($GLOBALS["database"]->conn,session_id());
    $hash=  mysqli_real_escape_string($GLOBALS["database"]->conn,hash("sha512",$sessid.$_SERVER['HTTP_USER_AGENT']));
        
   $query="select user from active_users where session_id='".$sessid."' and hash='".$hash."' and expires >'".  time()."';";
   //print($query);
   $exec_query=  mysqli_query($GLOBALS["database"]->conn, $query);
   if($exec_query===false)
       print "Error is ".(($___mysqli_res = mysqli_connect_error()));
   if(mysqli_num_rows($exec_query)){
       $data=  mysqli_fetch_assoc($exec_query);
      return $data['user'];
      
   }else
       return false;
    
	}
	
	public function check_login($username,$password) {
                $username=mysqli_real_escape_string($GLOBALS["database"]->conn, $username);
		$password=mysqli_real_escape_string($GLOBALS["database"]->conn, $password);
		
		$query=("select * from user where username='".$username."' and password ='".sha1($password)."';");
		//echo $query;
                $execquery=  mysqli_query($GLOBALS["database"]->conn, $query);
		if(mysqli_num_rows($execquery)){
			$_SESSION['test']="test";
			$sessid=  mysqli_real_escape_string($GLOBALS["database"]->conn, session_id()) ;
			$hash=   mysqli_real_escape_string($GLOBALS["database"]->conn, hash("sha512",$sessid.$_SERVER['HTTP_USER_AGENT'])) ;
			$userdata = mysqli_fetch_assoc(mysqli_query($GLOBALS["database"]->conn, $query));
			$expires=time()+(15*60);
			$query2 ="insert into active_users(user,session_id,hash,expires) values('".$userdata['user_id']."','".$sessid."','".$hash."',".$expires.");" ;
			//print($query2);
			mysqli_query($GLOBALS["database"]->conn, $query2);
			$_SESSION['userid']=$userdata['user_id'];
                        $_SESSION['name']=$userdata['name'];
						
						$query = "select username from user where user_id = ".$_SESSION['userid']."";
		$res=mysqli_fetch_assoc(mysqli_query($GLOBALS['database']->conn,$query));
		
		$username=$res['username'];
		$_SESSION['username'] = $username;
			$this->isLoggedIn=true;
			echo 'correct';
		}
		else{
			echo 'false';
        
		}
	}	
	
    public function performSession()
    {
   }

    
    

    public function closeSession()
    {

    }

} 
$GLOBALS['session'] = Session::getSession();
?>
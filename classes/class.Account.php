<?php

class Account
{
    public function Account()
    {
        // section 127-0-1-1--35dee990:156e03a0457:-8000:0000000000000898 begin
        // section 127-0-1-1--35dee990:156e03a0457:-8000:0000000000000898 end
    }

    /**
     * Short description of method manageAccount
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @return String
     */
    public function manageAccount()
    {
        $returnValue = null;

        // section 127-0-1-1--35dee990:156e03a0457:-8000:000000000000089A begin
        // section 127-0-1-1--35dee990:156e03a0457:-8000:000000000000089A end

        return $returnValue;
    }

    /**
     * Short description of method displayInfo
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @return mixed
     */
    public function displayInfo()
    {
        // section 127-0-1-1--35dee990:156e03a0457:-8000:000000000000089C begin
        // section 127-0-1-1--35dee990:156e03a0457:-8000:000000000000089C end
    }

    /**
     * Short description of method editProfile
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @return mixed
     */
    public function editProfile()
    {
        // section 127-0-1-1--35dee990:156e03a0457:-8000:000000000000089E begin
        // section 127-0-1-1--35dee990:156e03a0457:-8000:000000000000089E end
    }

    /**
     * Short description of method changePassword
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @return String
     */
    public function changePassword($curPass,$newPass)
    {   
               // echo "Current pass ".$curPass." new pass ".$newPass;
		$username=$_SESSION['username'];
		$query=("select * from user where username='".$username."';");
		//$query=("select * from user where username='".$username."' and password ='".sha1($password)."';");
		$execquery=  mysqli_query($GLOBALS["database"]->conn, $query);
		if(mysqli_num_rows($execquery)){
			$userdata = mysqli_fetch_assoc(mysqli_query($GLOBALS["database"]->conn, $query));
                        
			if(sha1($curPass)==$userdata['password']){
				$changePassQuery="Update user set password='".sha1($newPass)."' where username='".$username."';";
				$execquery=  mysqli_query($GLOBALS["database"]->conn, $changePassQuery);
				if($execquery)
					echo "Success";
				else
					echo "Error in changing password.Try again.";
			}
			else
				echo "Current Password Invalid";
		
		}
				
       
    }

} /* end of class Account */

?>
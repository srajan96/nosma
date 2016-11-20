<?php
class Group
{
   
    public function deleteGroup($gid){
             $query="delete from group_info where group_id=$gid";
            echo $query;
            
            mysqli_query($GLOBALS['database']->conn,$query);
               $query="delete from group_media where group_id=$gid";
            //echo $query;
            
            mysqli_query($GLOBALS['database']->conn,$query);
               $query="delete from group_messages where group_id=$gid";
            //echo $query;
            
            mysqli_query($GLOBALS['database']->conn,$query);
               $query="delete from group_notes where group_id=$gid";
            //echo $query;
            
            mysqli_query($GLOBALS['database']->conn,$query);
               $query="delete from group_users where group_id=$gid";
            //echo $query;
            
            mysqli_query($GLOBALS['database']->conn,$query);
    }
    public function addMembers($Contact)
    {
        // section 127-0-1-1--35dee990:156e03a0457:-8000:000000000000096A begin
        // section 127-0-1-1--35dee990:156e03a0457:-8000:000000000000096A end
    }

    /**
     * Short description of method removeMembers
     *0
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  Contact
     * @return mixed
     */
    public function removeMembers($Contact)
    {
        // section 127-0-1-1--35dee990:156e03a0457:-8000:000000000000096D begin
        // section 127-0-1-1--35dee990:156e03a0457:-8000:000000000000096D end
    }

    /**
     * Short description of method manageGroup
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @return mixed
     */
    public function manageGroup()
    {
        // section 10-5-1-60-5ce3491f:15700383283:-8000:0000000000000BBA begin
        // section 10-5-1-60-5ce3491f:15700383283:-8000:0000000000000BBA end
    }

    /**
     * Short description of method createGroup
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @return mixed
     */
    public function createGroup($name,$members)
    {
            $username=$_SESSION['username'];
            array_push($members,$username);
            //$memberspush($username);
            $pcount=  sizeof($members);
            
            $query="insert into group_info(group_name,admin_username,total_participants) values('$name','$username',$pcount);";
            //echo $query;
            
            mysqli_query($GLOBALS['database']->conn,$query);
            $query="select group_id from group_info where group_name='$name' and admin_username='$username'";
            //echo $query;
            $query=mysqli_query($GLOBALS['database']->conn,$query);
            $result=mysqli_fetch_assoc($query)['group_id'];
            
            
            foreach($members as $member){
                $query="insert into group_users values($result,'$member');";
                  mysqli_query($GLOBALS['database']->conn,$query);
            }
            
    } 
	public function listGroups(){
		$username=$_SESSION['username'];
		//echo $username;
		$query="Select * from group_info where group_id in (select group_id from group_users where username='".$username."');";
		//echo $query;
		$res=mysqli_query($GLOBALS['database']->conn,$query);
		if($res){
		$rows = array();
        $i=0;
		while($r = mysqli_fetch_assoc($res)) {
			$rows[$i] = $r;
            $i++;
		}

		echo json_encode($rows);
		}
		else
			echo "false";
		
	}
} /* end of class Group */

?>
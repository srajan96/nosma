<?php
class History
{
    public function History()
    {
        // section 127-0-1-1--35dee990:156e03a0457:-8000:00000000000008EC begin
        // section 127-0-1-1--35dee990:156e03a0457:-8000:00000000000008EC end
    }

    /**
     * Short description of method viewHistory
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @return ArrayList<Media>
     */
    public function viewHistory()
    {
        $username=$_SESSION['username'];
        $query="Select * from links where username ='".$username."';";
        $res=mysqli_query($GLOBALS['database']->conn,$query);
		//echo $query;
	
		
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
    }

} /* end of class History */

?>
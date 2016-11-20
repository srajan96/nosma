<?php


class Message
{
    public $message = null;

    /**
     * Short description of attribute image
     *
     * @access public
     * @var Image
     */
    public $image = null;

    /**
     * Short description of attribute document
     *
     * @access public
     * @var File
     */
    public $document = null;
	public function loadMessage($to,$last_mid,$type){
		$query = "select username from user where user_id = ".$_SESSION['userid']."";
		$res=mysqli_fetch_assoc(mysqli_query($GLOBALS['database']->conn,$query));
		
		$username=$res['username'];
		//print_r($username);
		if($last_mid==-1){
                    if($type=="c")
			$query = "select * from messages where (from_username = '$username'  and to_username = '$to') or (from_username = '$to'  and to_username = '$username') order by m_id limit 50 ;";
                    else
                        $query = "select * from group_messages where group_id=".$to." order by m_id limit 50 ;";
			//$query = "select * from messages where from_username in ('".$username."','".$to."') and to_username in ('".$username."','".$to."') order by m_id limit 50 ;";
		}
		else{
                  if($type=="c")
                    $query = "select * from messages where from_username in ('".$username."','".$to."') and to_username in ('".$username."','".$to."') and m_id >".$last_mid." order by m_id  limit 50 ;";
		  else
                      $query="select * from group_messages where group_id=".$to." and m_id >".$last_mid." order by m_id  limit 50 ;";
                      //echo $query;
                }
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
    public function sendMessage($to,$message,$type)
    {
		$username=$_SESSION['username'];
		
       if($type=="c"){
           $query="INSERT into messages(from_username,to_username,msg,date_time) values('".$username."','".$to."','". $message." ',now()) ;";
       }
       else{
           $query="INSERT into group_messages(group_id,from_username,msg,date_time) values('".$to."','".$username."','". $message."',now()) ;";
       }
				
				//echo $query;
				if(!mysqli_query($GLOBALS["database"]->conn, $query))
                                        echo mysqli_error($GLOBALS["database"]->conn);
					//echo "done";

				
		
    }
    public function file_uploader($file_name)
	{
		
		$query = "INSERT into uploads(file_name, extension) values ('$file_name','jpg');";
		echo $query;
		if(mysqli_query($GLOBALS["database"]->conn, $query))
					echo "done";

				else 
					echo "error"; 
		

	}
    /**
     * Short description of method sendImage
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @return mixed
     */
    public function sendImage()
    {
        // section 127-0-1-1--35dee990:156e03a0457:-8000:0000000000000946 begin
        // section 127-0-1-1--35dee990:156e03a0457:-8000:0000000000000946 end
    }

    /**
     * Short description of method sendDocument
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @return mixed
     */
    public function sendDocument()
    {
        // section 127-0-1-1--35dee990:156e03a0457:-8000:0000000000000948 begin
        // section 127-0-1-1--35dee990:156e03a0457:-8000:0000000000000948 end
    }
    

} /* end of class Message */

?>
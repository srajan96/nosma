<?php

class Download_ShareFile
{
    // --- ASSOCIATIONS ---
    // generateAssociationEnd :     // generateAssociationEnd :     // generateAssociationEnd :     // generateAssociationEnd :     // generateAssociationEnd :     // generateAssociationEnd : 

    // --- ATTRIBUTES ---

    /**
     * Short description of attribute link
     *
     * @access public
     * @var String
     */
    public $link = null;

    // --- OPERATIONS ---

    /**
     * Short description of method Download_ShareFile
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @return mixed
     */
    public function Download_ShareFile()
    {
        // section 127-0-1-1--35dee990:156e03a0457:-8000:000000000000095D begin
        // section 127-0-1-1--35dee990:156e03a0457:-8000:000000000000095D end
    }

    /**
     * Short description of method downloadFile
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @return File
     */
    public function downloadFile()
    {
        $returnValue = null;

        // section 127-0-1-1--35dee990:156e03a0457:-8000:000000000000095F begin
        // section 127-0-1-1--35dee990:156e03a0457:-8000:000000000000095F end

        return $returnValue;
    }

    public function shareFile($to,$username,$noteid,$type)
    {
        if($type=='c'){
            $query="INSERT INTO `shared_note`(`from_user_name`, `to_user_name`, `note_id`, `date_time`) VALUES ('".$username."','".$to."',".$noteid.",now());";
        }
        else{
            $query="INSERT INTO `group_notes`(`group_id`, `username`, `note_id`, `date_time`) VALUES ('".$to."','".$username."',".$noteid.",now())";
        }
        echo $query;
        if(!mysqli_query($GLOBALS["database"]->conn, $query))
                echo mysqli_error($GLOBALS["database"]->conn);
				
    }

} /* end of class Download_ShareFile */

?>
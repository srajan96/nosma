<?php
require_once 'class.User.php';

 class NoSMa
{
    // --- ASSOCIATIONS ---
    // generateAssociationEnd :     // generateAssociationEnd :     // generateAssociationEnd :     // generateAssociationEnd :     // generateAssociationEnd :     // generateAssociationEnd :     // generateAssociationEnd :     // generateAssociationEnd :     // generateAssociationEnd : 

    // --- ATTRIBUTES ---

    /**
     * Short description of attribute networktomachine
     *
     * @access public
     * @var Networktomachine
     */
    public $networktomachine = null;

    /**
     * Short description of attribute browser
     *
     * @access public
     * @var Broswer
     */
    public $browser = null;

    // --- OPERATIONS ---

    /**
     * Short description of method convertImage
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @return mixed
     */
    public function convertImage()
    {
        // section 10-5-1-60-5ce3491f:15700383283:-8000:0000000000000BA5 begin
        // section 10-5-1-60-5ce3491f:15700383283:-8000:0000000000000BA5 end
    }
    
     function getDashboard() {
        
		//if(!$this->isLoggedIn)
		
     header('Location: ../dashboard.php');
        
    }
    function getUserObject($id){
        return User::getUser($id);
    }

    /**
     * Short description of method DownloadShareImage
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @return mixed
     */
    public function DownloadShareImage()
    {
        // section 10-5-1-60-5ce3491f:15700383283:-8000:0000000000000BA7 begin
        // section 10-5-1-60-5ce3491f:15700383283:-8000:0000000000000BA7 end
    }

    /**
     * Short description of method createGroup
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @return mixed
     */
    public function createGroup()
    {
        // section 10-5-1-60-5ce3491f:15700383283:-8000:0000000000000BA9 begin
        // section 10-5-1-60-5ce3491f:15700383283:-8000:0000000000000BA9 end
    }

    /**
     * Short description of method createSubchannel
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @return mixed
     */
    public function createSubchannel()
    {
        // section 10-5-1-60-5ce3491f:15700383283:-8000:0000000000000BAB begin
        // section 10-5-1-60-5ce3491f:15700383283:-8000:0000000000000BAB end
    }

    /**
     * Short description of method sendMessage
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @return mixed
     */
    public function sendMessage()
    {
        // section 10-5-1-60-5ce3491f:15700383283:-8000:0000000000000BAD begin
        // section 10-5-1-60-5ce3491f:15700383283:-8000:0000000000000BAD end
    }

    /**
     * Short description of method connectToMachine
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @return mixed
     */
    public function connectToMachine()
    {
        // section 10-5-1-60-5ce3491f:15700383283:-8000:0000000000000BB1 begin
        // section 10-5-1-60-5ce3491f:15700383283:-8000:0000000000000BB1 end
    }

    /**
     * Short description of method createSession
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @return mixed
     */
    public function createSession()
    {
        // section 10-5-1-60-5ce3491f:15700383283:-8000:0000000000000BB3 begin
        // section 10-5-1-60-5ce3491f:15700383283:-8000:0000000000000BB3 end
    }

    /**
     * Short description of method connectToDatabase
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @return mixed
     */
    public function connectToDatabase()
    {
        // section 10-5-1-60-5ce3491f:15700383283:-8000:0000000000000BB5 begin
        // section 10-5-1-60-5ce3491f:15700383283:-8000:0000000000000BB5 end
    }

} /* end of abstract class NoSMa */
$GLOBALS['nosma'] = new NoSMa();
?>
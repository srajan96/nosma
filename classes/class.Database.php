<?php

class Database
{
     // variables
    var $dbName;
    var $dbUser;
    var $dbPass;
    var $conn;
	static $databaseInstance = null;
	
	private function Database() {
        $this->dbName = 'chat';
        $this->dbUser = 'root';
        $this->dbPass = 'leopard';

        // create db link
        $this->conn= mysqli_connect("localhost",  "$this->dbUser",  "$this->dbPass", "$this->dbName");

    }
	static function getDatabase(){
		if(self::$databaseInstance==null)
			self::$databaseInstance=new Database();
		return
			self::$databaseInstance;
	} 
	
    public function openConnection()
    {
       
	}

   
    public function closeConnection()
    {
         }

 
    public function executeQuery($query)
    {
    }

} 
$GLOBALS['database']=Database::getDatabase();
/* end of class Database */

?>
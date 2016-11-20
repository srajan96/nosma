<?php

define('A_TAGS_NO_ACTION', 0); // default
define('A_TAGS_STRIP', 1);
define('A_TAGS_SPECIAL_CHARS', 8);
define('A_TAGS_VALIDATE', 16); 
define('A_TAGS_STRIP_AND_NL2BR', 32);

define('A_SLASHES_AUTO', 0); // default
define('A_SLASHES_ADD', 1);
define('A_SLASHES_STRIP', 2);
define('A_SLASHES_NO_ACTION', 3);

/**
* Database class
*/
class ASysDB {

    // variables
    var $sDbName;
    var $sDbUser;
    var $sDbPass;

    var $vLink;

    /**
    * constructor
    */
    function ASysDB() {
        $this->sDbName = 'ajax_chat';
        $this->sDbUser = 'root';
        $this->sDbPass = 'password';

        // create db link
        $this->vLink = ($GLOBALS["___mysqli_ston"] = mysqli_connect("localhost",  $this->sDbUser,  $this->sDbPass));

        //select the database
        ((bool)mysqli_query( $this->vLink, "USE " . $this->sDbName));

        mysqli_query($GLOBALS["___mysqli_ston"], "SET names UTF8");
    }

    /**
    * execute sql query and return one value result
    */
    function getOne($query, $index = 0) {
        if (! $query)
            return false;
        $res = mysqli_query($GLOBALS["___mysqli_ston"], $query);
        $arr_res = array();
        if ($res && mysqli_num_rows($res))
            $arr_res = mysqli_fetch_array($res);
        if (count($arr_res))
            return $arr_res[$index];
        else
            return false;
    }

    /**
    * execute any query 
    */
    function res($query, $error_checking = true) {
        if(!$query)
            return false;
        $res = mysqli_query( $this->vLink, $query);
        if (!$res)
            $this->error('Database query error', false, $query);
        return $res;
    }

    /**
    * execute sql query and return table of records as result
    */
    function getPairs($query, $sFieldKey, $sFieldValue, $arr_type = MYSQLI_ASSOC) {
        if (! $query)
            return array();

        $res = $this->res($query);
        $arr_res = array();
        if ($res) {
            while ($row = mysqli_fetch_array($res,  MYSQLI_ASSOC)) {
                $arr_res[$row[$sFieldKey]] = $row[$sFieldValue];
            }
            ((mysqli_free_result($res) || (is_object($res) && (get_class($res) == "mysqli_result"))) ? true : false);
        }
        return $arr_res;
    }

    /**
    * execute sql query and return table of records as result
    */
    function getAll($query, $arr_type = MYSQLI_ASSOC) {
        if (! $query)
            return array();

        if ($arr_type != MYSQLI_ASSOC && $arr_type != MYSQLI_NUM && $arr_type != MYSQLI_BOTH)
            $arr_type = MYSQLI_ASSOC;

        $res = $this->res($query);
        $arr_res = array();
        if ($res) {
            while ($row = mysqli_fetch_array($res,  $arr_type))
                $arr_res[] = $row;
            ((mysqli_free_result($res) || (is_object($res) && (get_class($res) == "mysqli_result"))) ? true : false);
        }
        return $arr_res;
    }

    function escape($s) {
        return ((isset($GLOBALS["___mysqli_ston"]) && is_object($GLOBALS["___mysqli_ston"])) ? mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $s) : ((trigger_error("[MySQLConverterToo] Fix the mysql_escape_string() call! This code does not work.", E_USER_ERROR)) ? "" : ""));
    }

    function lastId() {
        return ((is_null($___mysqli_res = mysqli_insert_id($this->vLink))) ? false : $___mysqli_res);
    }

    function process_db_input($text, $strip_tags = 0, $addslashes = 0) {
        if ((get_magic_quotes_gpc() && $addslashes == A_SLASHES_AUTO) || $addslashes == A_SLASHES_STRIP)
            $text = stripslashes($text);
        elseif ($addslashes == A_SLASHES_ADD)
            $text = addslashes($text);

        switch ($strip_tags) {
            case A_TAGS_STRIP_AND_NL2BR:
                return ((isset($GLOBALS["___mysqli_ston"]) && is_object($GLOBALS["___mysqli_ston"])) ? mysqli_real_escape_string($GLOBALS["___mysqli_ston"], nl2br(strip_tags($text))) : ((trigger_error("[MySQLConverterToo] Fix the mysql_escape_string() call! This code does not work.", E_USER_ERROR)) ? "" : ""));
            case A_TAGS_STRIP:
                return ((isset($GLOBALS["___mysqli_ston"]) && is_object($GLOBALS["___mysqli_ston"])) ? mysqli_real_escape_string($GLOBALS["___mysqli_ston"], strip_tags($text)) : ((trigger_error("[MySQLConverterToo] Fix the mysql_escape_string() call! This code does not work.", E_USER_ERROR)) ? "" : ""));    
            case A_TAGS_SPECIAL_CHARS:
                return ((isset($GLOBALS["___mysqli_ston"]) && is_object($GLOBALS["___mysqli_ston"])) ? mysqli_real_escape_string($GLOBALS["___mysqli_ston"], htmlspecialchars($text, ENT_QUOTES, 'UTF-8')) : ((trigger_error("[MySQLConverterToo] Fix the mysql_escape_string() call! This code does not work.", E_USER_ERROR)) ? "" : "")); 
            case A_TAGS_VALIDATE:
                return ((isset($GLOBALS["___mysqli_ston"]) && is_object($GLOBALS["___mysqli_ston"])) ? mysqli_real_escape_string($GLOBALS["___mysqli_ston"], clear_xss($text)) : ((trigger_error("[MySQLConverterToo] Fix the mysql_escape_string() call! This code does not work.", E_USER_ERROR)) ? "" : ""));
            case A_TAGS_NO_ACTION:
            default:
                return ((isset($GLOBALS["___mysqli_ston"]) && is_object($GLOBALS["___mysqli_ston"])) ? mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $text) : ((trigger_error("[MySQLConverterToo] Fix the mysql_escape_string() call! This code does not work.", E_USER_ERROR)) ? "" : ""));
        }	
    }

    function error($text, $isForceErrorChecking = false, $sSqlQuery = '') {
        //echo $text; exit;
        $this->genMySQLErr ($text, $sSqlQuery);
    }

    function genMySQLErr($out, $query ='') {
        $aBackTrace = debug_backtrace();
        unset( $aBackTrace[0] );
        
        if( $query )
        {
            //try help to find error
            
            $aFoundError = array();
            
            foreach( $aBackTrace as $aCall )
            {
                foreach( $aCall['args'] as $argNum => $argVal )
                {
                    if( is_string($argVal) and strcmp( $argVal, $query ) == 0 )
                    {
                        $aFoundError['file']     = $aCall['file'];
                        $aFoundError['line']     = $aCall['line'];
                        $aFoundError['function'] = $aCall['function'];
                        $aFoundError['arg']      = $argNum;
                    }
                }
            }
            
            if( $aFoundError )
            {
                $sFoundError = <<<EOJ
<br />
Found error in the file '<b>{$aFoundError['file']}</b>' at line <b>{$aFoundError['line']}</b>.<br />
Called '<b>{$aFoundError['function']}</b>' function with erroneous argument #<b>{$aFoundError['arg']}</b>.<br /><br />
EOJ;
            }
        }
        echo $sFoundError; exit;
    }

}

$GLOBALS['mysql'] = new ASysDB();

?>

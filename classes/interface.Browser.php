<?php

error_reporting(E_ALL);

/**
 * untitledModel - interface.Browser.php
 *
 * $Id$
 *
 * This file is part of untitledModel.
 *
 * Automatically generated on 12.10.2016, 17:08:56 with ArgoUML PHP module 
 * (last revised $Date: 2010-01-12 20:14:42 +0100 (Tue, 12 Jan 2010) $)
 *
 * @author firstname and lastname of author, <author@example.org>
 */

if (0 > version_compare(PHP_VERSION, '5')) {
    die('This file was generated for PHP 5');
}

/**
 * include NoSMa
 *
 * @author firstname and lastname of author, <author@example.org>
 */
require_once('class.NoSMa.php');

/**
 * include Notification
 *
 * @author firstname and lastname of author, <author@example.org>
 */
require_once('class.Notification.php');

/**
 * include Session
 *
 * @author firstname and lastname of author, <author@example.org>
 */
require_once('class.Session.php');

/* user defined includes */
// section 127-0-1-1--35dee990:156e03a0457:-8000:0000000000000929-includes begin
// section 127-0-1-1--35dee990:156e03a0457:-8000:0000000000000929-includes end

/* user defined constants */
// section 127-0-1-1--35dee990:156e03a0457:-8000:0000000000000929-constants begin
// section 127-0-1-1--35dee990:156e03a0457:-8000:0000000000000929-constants end

/**
 * Short description of class Browser
 *
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
interface Browser
{


    // --- OPERATIONS ---

    /**
     * Short description of method Browser
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @return mixed
     */
    public function Browser();

    /**
     * Short description of method readInput
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @return mixed
     */
    public function readInput();

    /**
     * Short description of method chooseOption
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @return mixed
     */
    public function chooseOption();

    /**
     * Short description of method displayMessage
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  msg
     * @return mixed
     */
    public function displayMessage($msg);

} /* end of interface Browser */

?>
<?php

error_reporting(E_ALL);

/**
 * untitledModel - class.Members.php
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
 * include Contact
 *
 * @author firstname and lastname of author, <author@example.org>
 */
require_once('class.Contact.php');

/**
 * include Group
 *
 * @author firstname and lastname of author, <author@example.org>
 */
require_once('class.Group.php');

/* user defined includes */
// section 127-0-1-1--35dee990:156e03a0457:-8000:0000000000000872-includes begin
// section 127-0-1-1--35dee990:156e03a0457:-8000:0000000000000872-includes end

/* user defined constants */
// section 127-0-1-1--35dee990:156e03a0457:-8000:0000000000000872-constants begin
// section 127-0-1-1--35dee990:156e03a0457:-8000:0000000000000872-constants end

/**
 * Short description of class Members
 *
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
class Members
{
    // --- ASSOCIATIONS ---
    // generateAssociationEnd :     // generateAssociationEnd : 

    // --- ATTRIBUTES ---

    /**
     * Short description of attribute userids
     *
     * @access public
     * @var ArrayList<Contact>
     */
    public $userids = null;

    // --- OPERATIONS ---

    /**
     * Short description of method getUserList
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @return Contact
     */
    public function getUserList()
    {
        $returnValue = null;

        // section 127-0-1-1--35dee990:156e03a0457:-8000:000000000000090B begin
        // section 127-0-1-1--35dee990:156e03a0457:-8000:000000000000090B end

        return $returnValue;
    }

} /* end of class Members */

?>
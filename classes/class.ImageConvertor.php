<?php

error_reporting(E_ALL);

/**
 * untitledModel - class.ImageConvertor.php
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
 * include Download_ShareFile
 *
 * @author firstname and lastname of author, <author@example.org>
 */
require_once('class.Download_ShareFile.php');

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
 * include Network to machine
 *
 * @author firstname and lastname of author, <author@example.org>
 */
require_once('interface.Network to machine.php');

/* user defined includes */
// section 127-0-1-1--35dee990:156e03a0457:-8000:0000000000000876-includes begin
// section 127-0-1-1--35dee990:156e03a0457:-8000:0000000000000876-includes end

/* user defined constants */
// section 127-0-1-1--35dee990:156e03a0457:-8000:0000000000000876-constants begin
// section 127-0-1-1--35dee990:156e03a0457:-8000:0000000000000876-constants end

/**
 * Short description of class ImageConvertor
 *
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
class ImageConvertor
{
    // --- ASSOCIATIONS ---
    // generateAssociationEnd :     // generateAssociationEnd :     // generateAssociationEnd :     // generateAssociationEnd : 

    // --- ATTRIBUTES ---

    /**
     * Short description of attribute numberOfImages
     *
     * @access public
     * @var int
     */
    public $numberOfImages = 0;

    /**
     * Short description of attribute tags
     *
     * @access public
     * @var ArrayList<String>
     */
    public $tags = null;

    /**
     * Short description of attribute accesstype
     *
     * @access public
     * @var String
     */
    public $accesstype = null;

    // --- OPERATIONS ---

    /**
     * Short description of method getImage
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  File
     * @return mixed
     */
    public function getImage($File)
    {
        // section 127-0-1-1--35dee990:156e03a0457:-8000:0000000000000954 begin
        // section 127-0-1-1--35dee990:156e03a0457:-8000:0000000000000954 end
    }

    /**
     * Short description of method convertImage
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  File
     * @return File
     */
    public function convertImage($File)
    {
        $returnValue = null;

        // section 127-0-1-1--35dee990:156e03a0457:-8000:0000000000000956 begin
        // section 127-0-1-1--35dee990:156e03a0457:-8000:0000000000000956 end

        return $returnValue;
    }

} /* end of class ImageConvertor */

?>
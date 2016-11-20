<?php
require(realpath(__DIR__ . '/../classes/class.Contact.php'));


//echo "hello";
$contact=new Contact();
$contact->listContacts();


?>
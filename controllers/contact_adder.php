<?php

require(realpath(__DIR__ . '/../classes/class.Contact.php'));
require(realpath(__DIR__ . '/../classes/class.User.php'));
		
$contact=new Contact();
$contact->addContact($_POST['username']);


?>
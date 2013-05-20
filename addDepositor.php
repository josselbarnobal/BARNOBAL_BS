<?php

	include 'DAO/systemdao.php';

	$depositorname = $_POST['depositorname'];
	$address = $_POST['address'];
	$occupation = $_POST['occupation'];
	$contactnumber = $_POST['contactnumber'];

	$action = new systemdao();
	$action->addDepositor($depositorname, $address, $occupation, $contactnumber);

?>

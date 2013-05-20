<?php

	include'DAO/systemdao.php';

	$depositor_id=$_POST['depositor_id'];
	$depositorname = $_POST['depositorname'];
	$address = $_POST['address'];
	$occupation = $_POST['occupation'];
	$contactnumber = $_POST['contactnumber'];

	$action = new systemdao();
	$action->saveDepositor($depositor_id, $depositorname, $address, $occupation, $contactnumber);

?>

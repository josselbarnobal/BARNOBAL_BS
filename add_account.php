<?php

	include 'DAO/systemdao.php';

	
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$accountname = $_POST['accountname'];
	$accountpassword = $_POST['accountpassword'];
	$accountpassword2 = $_POST['accountpassword2'];

	$action = new systemdao();
	$action->register($firstname,$lastname,$accountname,$accountpassword,$accountpassword2);

?>

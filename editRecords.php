<?php

	include 'DAO/systemdao.php';
	 
	$id = $_POST['id'];	
  
	$action = new systemdao();
	$action->retrieve_records($id);

?>

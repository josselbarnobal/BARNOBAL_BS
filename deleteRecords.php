<?php

include 'DAO/systemdao.php';

		
	$id = $_POST['id'];
	
	$action = new systemdao();
	$action->deleteRecords($id);




?>




<?php

include 'DAO/systemdao.php';

		
	$depositor_id = $_POST['depositor_id'];
	
	$action = new systemdao();
	$action->deleteDepositor($depositor_id);




?>




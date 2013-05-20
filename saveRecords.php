<?php

	include'DAO/systemdao.php';

	$id=$_POST['id'];
	$depositor_id = $_POST['depositor_id'];
	$deposits = $_POST['deposits'];
	$date_of_deposits = $_POST['date_of_deposits'];
	$withdrawals = $_POST['withdrawals'];
	$date_of_withdrawals = $_POST['date_of_withdrawals'];
	$balance = $_POST['balance'];

	$action = new systemdao();
	$action->saveRecords($id, $depositor_id, $deposits, $date_of_deposits, $withdrawals, $date_of_withdrawals, $balance);



?>

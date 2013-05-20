
<?php
session_start();
if (!isset($_SESSION['accountname'])){
	header('Location: logIn.php');
} else {
	$username = $_SESSION['accountname'];
}
?>


<!DOCTYPE html>
<html>
<title>BANKING SYSTEM</title>
<link rel="shortcut icon" href="icon/banking.jpeg" />
<head>
<style>
img.delete {
	cursor: pointer;

}
img.edit {
	cursor: pointer;

}
</style>
<script src="js/jquery-1.8.2.min.js"></script>
<script src="js/banking.js"></script>
<script src ="js/jquery-ui-1.9.0.custom.min.js"></script>
<link rel="stylesheet" href="css/jquery-ui-1.9.0.custom.min.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="bootstrap/css/bootstrap.css">

</head>

&#x2665;<a href="logOut.php" id="logout">logout</a><br />
<body>
<nav id="main">
	<div id="men">
	<a href ="home.php" id="home1" class="menu">HOME</a>
	<a href ="depositor.php" id="depositor1" class="menu">DEPOSITOR</a>
	<a href ="records.php" id="records1" class="menu">RECORDS</a>
	<a href ="transactions.php" id ="transactions1" class="menu">TRANSACTION</a>
	</div>
</nav>

<div id="records">
<img src ="css/images/banner.jpg"><br><br>

<button type="button" class="btn btn-primary" id= "add_button_records">ADD RECORDS</button></br>


<table id = "records_table" border = "2">
 <tr>
   <td>Id</td>
   <td>Depositor_Id</td>
   <td>Deposits</td>
   <td>Date_of_deposit</td>
   <td>Withrawals</td>
   <td>Date_of_withdrawal</td>
   <td>Total_Balance</td>
   <td>Actions</td>
   
 </tr>
</table>

</div><br /><br /><br />

<br />
<br />
<div id="anchor1">
follow us on<a href="http://www.facebook.com/eizcaladezzertfunk?ref=tn_tnmn"> <img src="css/images/facebook.jpeg "id="icons"></a>
<a href="http://www.twitter.com"><img src="css/images/twitter.png" id="icons"></a>
<a href="http://www.yahoomail.com"><img src="css/images/yahoo.png" id="icons"></a>
<a href="http://www.gmail.com"><img src="css/images/gmail.png" id="icons"></a>
<a href="http://www.skype.com"><img src="css/images/skype.png" id="icons"></a>

</div>
<div id="myname">
	&#x2665;
	jossel barnobal
	&#x2665;
</div>


<div id="addDialog_records" title="ADD RECORDS">
<form class = "formClass" method = "POST">
<fieldset>
	<legend id ="list1">Add CostumerRecord</legend>
		Depositor_Id:<input type="text" name="depositor_id"><br />
		Deposits:<input type="text" name="deposits"><br />
		Date of Deposit:<input type="text" name="date_of_deposits" id="date_of_deposit"><br />
		Withdrawals:<input type="text" name="withdrawals"><br />
		Date of Withdrawals:<input type="text" name="date_of_withdrawals" id="date_of_withdrawal"><br />
		Balance:<input type="text" name="balance"><br />
			<input type="hidden" name="id"/>
			<br/><br/>
</fieldset>
</form><br /><br />
</div> 
</div>
<div class = "myDialog" title = "DELETE">
	<p>Are you sure you want to delete it ?</p>
</div>
</body>

</html>


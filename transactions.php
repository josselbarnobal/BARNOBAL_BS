
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
<script src="js/jquery-1.8.2.min.js"></script>
<script src="js/banking.js"></script>
<script src ="js/jquery-ui-1.9.0.custom.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="bootstrap/js/bootstrap.js"></script>
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
</nav><br />

<div id = "search">
<!--<label for="search"><img src="css/images/search.png" id = "search1"></label>-->
<i class="icon-search"></i>
<input title="search" id ="searchtransac" placeholder="search" />

</div><br /><br />

<div id="transactions">
<img src ="css/images/banner.jpg"><br><br>	
	ALL TRANSACTIONS
	

	<table id="transactions_table" border="2" ; cellspacing=0;>
		<tr>
			<td>DepositorName</td>
			<td>Deposits</td>
			<td>Date of Deposits</td>
			<td>Withdrawals</td>
			<td>Date of Withdrawals</td>
			<td>Total Balance</td>
		</tr>
	
	</table>
	
	
	
</div>

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



</body>

</html>

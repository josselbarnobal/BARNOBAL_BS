
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
<link rel="stylesheet" href="css/jquery-ui-1.9.0.custom.min.css" />
<link rel="stylesheet" href="css/style.css" />
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="bootstrap/css/bootstrap.css">

</head>
&#x2665;<a href="logOut.php" id="logout">logout</a><br />
<br />

<body>

<nav id="main">
	<div id="men">
	<a href ="home.php" id="home1" class="menu">HOME</a>
	<a href ="depositor.php" id="depositor1" class="menu">DEPOSITOR</a>
	<a href ="records.php" id="records1" class="menu">RECORDS</a>
	<a href ="transactions.php" id ="transactions1" class="menu">TRANSACTION</a>
	</div>
</nav>

<div id="home">
<h1>HOME</h1> <br />
<img src ="css/images/banner.jpg"><br><br>						
<table>
<tr>

	<td><img src="css/images/images.jpeg"></td>

	<td><br><br><br><br></td>
	<td><p>
	Banking is the heart and soul of every economy, and it is one sector that will never go out of style.<br> While the global economy may be going through turmoil, the banking sector in India is a highly competitive and rapidly growing space.<br> The Indian banking space is divided between state banks, private owned banks and co-operative banks. <br>With more than half of India’s population still under the age of 30, the demand for the simplest banking products like savings accounts, credit cards and loans rises at an exceptional rate each year and should continue to do so for the next 20 years.<br><br>

	While Technology has done its bit to ensure that cash availability and access has become a lot easier through the ever increasing number of ATMs, there is still a need for other financial products to be made available to the masses.<br> Branches are coming up by the dozen in smaller cities and towns across the country and there will always be a demand for quality personnel to meet this growth.<br><br>

	Reports indicate that the Indian banking space has witnessed an 18% growth over the last decade, with the last 5-years exhibiting growth rates just under 25%.<br> The industry size is believed to be closing in on $1.5 trillion and Indian banking will in all likelihood cross the $5 trillion mark within the next 5 years.<br><br>

	If there was ever a good time to be joining the banking space, it is now.<br>
	</p></td>
</tr>
</table>
</div><br /><br /><br /><br />


<div id="anchor1">
follow us on<a href="http://www.facebook.com/eizcaladezzertfunk?ref=tn_tnmn"> <img src="css/images/facebook.jpeg "id="icons"></a>
<a href="http://www.twitter.com/josselbarnobal"><img src="css/images/twitter.png" id="icons"></a>
<a href="http://www.yahoomail.com/josselbarnobal@ymail.com"><img src="css/images/yahoo.png" id="icons"></a>
<a href="http://www.gmail.com/josselbarnobal76@gmail.com"><img src="css/images/gmail.png" id="icons"></a>
<a href="http://www.skype.com/josselbarnobal"><img src="css/images/skype.png" id="icons"></a>

</div>
<div id="myname">
	&#x2665;
	jossel barnobal
	&#x2665;
</div>


</body>

</html>

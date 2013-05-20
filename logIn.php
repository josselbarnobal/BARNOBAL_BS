<?php
      
  session_start();
	include 'DAO/systemdao.php';
	$action = new systemdao();
	if(isset($_REQUEST['accountname']) && isset($_REQUEST['accountpassword'])){
				
			$verrify = $action->logIn($_REQUEST['accountname'],$_REQUEST['accountpassword']);	
		if($verrify){
				$_SESSION['accountname'] = $_REQUEST['accountpassword'];
				header('Location:home.php');	
			}else{
					$errMsg = "AccountName add AccountPassword Didn't Match";
			}
		}
			
		
?>

<!DOCTYPE html>
<html lang="en">

<meta charset="utf-8">
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
         
         <title>Log-in</title>
    </head>
	    <body>
	   
	    
	 <fieldset id ="logIn">
		<a href ="index.php" id ="index" ><i class="icon-home icon-black"></i>HOME</a>
		<img src ="css/images/banner.jpg"><br><br>

	 	 <form id="login_form" method="POST">
		        <fieldset>
		            <legend>Log-In HERE !</legend>
		            Accountname:<input type="text" name="accountname"/><br/>
		            AccountPassword:<input type="password" name="accountpassword"/>
		        </fieldset>
		        <button id="login">Log-in</button>
		        
		        <!--<div class="col"><a href='register.php'>Register Now!</a></div>
			<?php if (isset($errMsg)) echo $errMsg; ?>-->
		 </form>  
		    <br/>
		    <br/>
		    
	     </fieldset> 
		
	    </body>   
     
</html>

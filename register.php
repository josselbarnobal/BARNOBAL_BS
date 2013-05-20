<!DOCTYPE html>

<html>
   <head>
      <title>Register</title>
      <link rel="stylesheet" href="css/style.css">
	 <script src="js/jquery-1.8.2.min.js"></script>
        <script src="js/banking.js"></script>
   </head>
   <body>
      <h1>Sign-up</h1>
     <div id="reg">
          <center><form action='logIn.php' method='POST'>
           <fieldset id="registers">
               <legend>Register Here!! </legend>
               Firstname:<input type="text" name="firstname" /><br />
               Lastname:<input type="text" name="lastname"/><br />
               AccountName:<input type="text" name="accountname" /><br />
               AccountPassword:<input type="password" name="accountpassword"/><br />
               Retype Password:<input type="password" name="accountpassword2"/><br />
            </fieldset>
            <button id="register">Register</button>
	   </center>
        
            
        </div> <!--reg-->   
            
         <?php if (isset($errMsg)) echo $errMsg; ?>
        
       
         <!--<input type="submit" value="Login" class="enviar"/>-->
         </form> 

      </section>
   </body>
</html>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title> Page authentification </title>
		<link rel="stylesheet" href="Web/css/style.css">
    </head>
    <body class="main_theme">
	
	<?php
// define variables and set to empty values
$username = $password = "";
$usernameErr = $passwordErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
   if (empty($_POST["Username"])) {
     $usernameErr = "Username is required";
   } else {
     $username = test_input($_POST["Username"]);
   }
   
   if (empty($_POST["password"])) {
     $passwordErr = "Password is required";
   } else {
     $password = test_input($_POST["password"]);
   }
   
   if (isset($_POST['Username']) AND isset($_POST['password']) AND $_POST['password'] ==  "123")
   {
	   header("Location: Page-Soumission.php"); // redirects
	  
   } else {
	   $passwordErr = "Mot de passe invalide !";
   }
}
function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>
	
	 <!-- #Balise entête -->
  	<header class="entete">
	    <img src="Web/images/slider1.jpg">
        <h2> <strong> Authentification Page   </strong> </h2>
       
	</header>
	
	 <!-- #Balise navigation -->
	 <nav>
          
     </nav> 
<!-- #Balise centrale -->
       
  <section>	
   <div class="res">	
      <div>
        <br></br><br></br>
        <form method="post" class="smart-green" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <h1>Authentification
        <span>Please fill all the texts in the fields.</span>
    </h1>
    <label>
	    <p><span class="error">* Required field.</span></p>	
        <span>Username :</span><span class="error">* <?php echo $usernameErr;?> </span>
        <input id="user" type="text" name="Username" placeholder="Your Username" />
		
		
    </label>
    
    <label>
        <span>Password :</span><span class="error">* <?php echo $passwordErr ;?> </span>
        <input id="password" type="password" name="password" placeholder="Your password" />
		
    </label>
    
   
   
   
     <label>
        <span>Subject :</span><select name="selection">
        <option value="Soumission client">Client Submission</option>
        <option value="Facture client">Client's Invoice</option>
		<option value="Administrateur">Administrator</option>
        </select>
    </label>    
     <label>
        <span>&nbsp;</span> 
        <input type="submit" class="button" value="Send" /> 
    </label>    
</form>
</div>
</div>
</section>

  <!-- #Balise du pied de page -->
   <footer class="pied" >
        <ul>
        
			
			<li><a href="http://www.hydro-evolution.com/"> Home Page !</a> </li>
							
			 <li><a href="menus.php"> Menu Page </a></li>
		
		
		
        </ul>
    </footer>
	
	
    </body>
</html>





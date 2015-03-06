<!DOCTYPE html>
<html>
    <head>
       <title> Secret </title>
    </head>
    <body>
        <h2> Ceci est la page de validation </h2>
   
	   <?php
	   if (isset($_POST['Username']) AND isset($_POST['password']) AND $_POST['password'] ==  "123")
	   {
		$login = $_POST['Username'];
		$pass_crypte = crypt($_POST['password']); // On crypte le mot de passe

		echo '<p>Ligne à copier dans le .htpasswd :<br />' . $login . ':' . $pass_crypte . '</p>';
		header("Location: Page-Soumission.php"); // redirects

	   }

      else // On n'a pas encore rempli le formulaire
       {

		   echo " Vous avez saisi le mauvais mot de passe veuillez ! <br />";
		   echo "appuyez sur le lien en bas pour revenir a la page precedente. <br />";
		   header("Location: index.php"); // redirects
	   }
	   ?>
       	   
        <ul>
            <li><a href="index.php"> Page du formulaire !</a> </li>
        </ul>
    </body>
</html>
<!DOCTYPE html>
<html>
	<head>
		
		<title>MacronMania</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="../css/style.css">
		
	</head>


	<header>
	
	
		
		<div id = "logo_nom">
			<a href="Accueil.html"> <img href="Accueil" class="logo" src="../images/logo.png" alt="logo"></a>
			<a  id = "macronmania" href="Accueil.php"> Macronmania <a/> 
		</div>

		<form action = "verif-recherche.php" method = "get">
		   <input type = "search" name = "terme">
		   <input type = "submit" name = "s" value = "Rechercher">
	  	</form>


		<nav>	
			<div><a href="Contact.html">Contact</a></div>
			<div><a href="Compte.html">Compte</a></div>
		</nav>
	    
	    <a href='panier.php'>PANIER</a>

	</header>

	<body>

		<cite>Traversez la rue pour trouver le meilleur jeu de votre vie</cite>

		<main>

			<h1>Jeux</h1>

			<?php
			     $headers ='From: "' . $_POST["nom"] . ' ' . $_POST["prenom"] . '"<' . $_POST["email"] . '>' . "\n";
			     $headers .='Content-Type: text/plain; charset="iso-8859-1"'."\n";
			     $headers .='Content-Transfer-Encoding: 8bit';

			     if(mail('znathangirotz@gmail.com', $_POST["sujet"], $_POST["msg"], $headers))
			     {
			          echo 'Le message a bien été envoyé';
			     }
			     else
			     {
			          echo 'Le message n\'a pu être envoyé';
			     }
			?> 

		</main>

	</body>

</html>
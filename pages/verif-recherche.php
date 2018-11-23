<?php

	require_once "../model/Model.php";

	if (isset($_GET["s"]) AND $_GET["s"] == "Rechercher"){

		 $_GET["terme"] = htmlspecialchars($_GET["terme"]); //pour sécuriser le formulaire contre les failles html
		 $terme = $_GET["terme"];
		 $terme = trim($terme); //pour supprimer les espaces dans la requête de l'internaute
		 $terme = strip_tags($terme); //pour supprimer les balises html dans la requête

		if (isset($terme)){
			 $terme = strtolower($terme); // mets les caractère en minuscule
			 $select_terme = Model::$pdo -> prepare("SELECT nomJeu, plateforme FROM Jeux WHERE nomJeu LIKE ?"); //sélectionne les jeux qui contiennent des mots qui ressemblent à la requête du client.
			 $select_terme->execute(array("%".$terme."%"));
		}
		else
		{
		 $message = "Vous devez entrer votre requete dans la barre de recherche";
		}
	}
?>



<!DOCTYPE html>
<html>

<head>
	
	<title>MacronMania</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	
</head>


<header>
	
	
		
	<a href="Accueil.html"> <img href="Accueil" class="logo" src="../images/logo.png" alt="logo"></a>

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
		  while($terme_trouve = $select_terme->fetch()) {
		   echo "<div><h4>".$terme_trouve['nomJeu']." | ".$terme_trouve['plateforme']."</h4>";
		  }
		  $select_terme->closeCursor();
	    ?>

	</main>

</body>

</html>
<!DOCTYPE html>
	<html>

	<head>
		
		<title>MacronMania</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		
	</head>


	<header>
		
		<div id="logo_nom">
			<a href="?action=Accueil"> <img href="Accueil" class="logo" src="images/logo.png" alt="logo"> </a>
			<a id = "macronmania" href="?action=Accueil"> Macronmania <a/>
		</div>

		<form method = "get">
			<input type="hidden" name="action" value="recherche">
			<input type = "search" name = "termes">
			<input type = "submit" value = "Rechercher">
	  	</form>


		<nav>
			<div><a href="?action=Contact">Contact</a></div>
			<div><a href="?action=Compte">Compte</a></div>
		</nav>
	    
	    <a href='panier.php'>PANIER</a>

	</header>

	<body>

		<cite>Traversez la rue pour trouver le meilleur jeu de votre vie</cite>

		<main>

			<h1>Jeux</h1>

			<div class="select-genre">
			  <select>
			    <option value="0">Genre</option>
			    <option value="1">Audi</option>
			    <option value="2">BMW</option>
			    <option value="3">Citroen</option>
			    <option value="4">Ford</option>
			    <option value="5">Honda</option>
			    <option value="6">Jaguar</option>
			  </select>
			</div>

			<?php

				if ($resRecherche == false)
					echo "Pas de resultats";
				else {
					foreach ($resRecherche as $v) {
					 	echo "<p>" . $v->getNomJeu() . " | " . $v->getPlateforme() . "</p>";
					}
				}

			?>

		</main>

	</body>



	</html>
<!--***********************************************************************************************************-->
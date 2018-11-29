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
			<div class="formSearch">
				<input type="hidden" name="action" value="recherche">
				<input type = "text" class="searchBar" placeholder="Recherche..." autocomplete="off" name = "termes">
				<button type="submit"></button>
			</div>
	  	</form>


		<nav>
			<div><a href="?action=Contact">Contact</a></div>
			<div><a href="?action=Compte">Compte</a></div>
		</nav>
	    
	    <a href='panier.php'>PANIER</a>

	</header>

	<body>

		<cite><h3>Traversez la rue pour trouver le meilleur jeu de votre vie</h3></cite>

		<main>

			<h1>Résultats de recherche</h1>

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
					echo "<p>Pas de resultats</p>";
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
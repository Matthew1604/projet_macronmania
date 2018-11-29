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
				<button type="submit" name="Rechercher"></button>
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

			<h1>Mon compte</h1>

			<section class="connexion" action ="Connexion.php">
				


			</section>


			<section class="inscription">
				

				<form action = "Inscription.html" method = "get">
				   <input type = "submit" name = "inscription" value = "Créer un compte">
	  			</form>

			</section>


		</main>

	</body>

	<footer>
		
	</footer><h1>

	</html>
<!--***********************************************************************************************************-->
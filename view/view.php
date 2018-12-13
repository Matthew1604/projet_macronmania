<?php
	  require_once(File::build_path(array('controller', 'ControllerClients.php')));
	  require_once(File::build_path(array('controller', 'ControllerJeux.php')));
?>

<!DOCTYPE html>
	<html>
		<head>
			
			<title><?php echo $pagetitle; ?></title>
			<meta charset="utf-8" />
			<link rel="stylesheet" type="text/css" href="css/style.css" />
			<link rel="icon" href="images/icon.png" type="image/x-icon" />
			
		</head>


		<body>

			<header>
			
				<div id="logo_nom">
					<a href="?action=Accueil"> <img alt="logo" class="logo" src="images/logo.png" /> </a>
					<a id = "macronmania" href="?action=Accueil"> Macronmania </a>
				</div>

				<form method = "get">
					<div class="formSearch">
						<input type="hidden" name="action" value="recherche" />
						<input type = "text" class="searchBar" placeholder="Recherche..." autocomplete="off" name = "termes" />
						<button class="search" type="submit"></button>
					</div>
			  	</form>

			  	<a href="?action=customSearch">Recherche avancée</a>

				<nav>
					<?php

						if(isset($_SESSION['pseudo']) && $_SESSION['pseudo'] == 'admin') {
							echo '<div><a href="?action=create"><img alt="ajouterJeu" class = "logo" src = "images/ajouter.png" ></a></div>';
						}
						else echo '<div><a href="?controller=Clients&action=Contact"><img alt="contact" class = "logo" src = "images/contact.png" ></a></div>';

					?>
					<div><?php if(isset($_SESSION['pseudo'])) echo '<a href="?controller=Clients&action=Compte"> <img alt="compte" class = "logo" src = "images/compte.png" > </a>'; else echo '<a href="?controller=Clients&action=Connexion"><img alt="connexion" class = "logo" src = "images/on.png" ></a>'; ?></div>
					<?php 

						if(isset($_SESSION['pseudo']))
							echo '<div><a href="?controller=Clients&action=Deconnexion"><img alt="deconnexion" class = "logo" src = "images/off.png" ></a></div>';

					?>
				</nav>
			    
			    <a href='?action=panier'><img alt="panier" class = "logo" src = "images/panier.png" ></a>

			</header>

			<h3 id="cite"><cite>Traversez la rue pour trouver le meilleur jeu de votre vie</cite></h3>

			<main>
				<div class="main">
			<?php
				$filepath = File::build_path(array("view", $controller, "$view.php"));
				require $filepath;
			?>
				</div>
			</main>

			<footer>

			</footer>

		</body>


	</html>
<!--***********************************************************************************************************-->
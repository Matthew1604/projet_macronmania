<?php if(!isset($_SESSION['id'])) session_start(); 
	  require_once(File::build_path(array('controller', 'ControllerClient.php')));
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


		<header>
			
			<div id="logo_nom">
				<a href="?action=Accueil"> <img href="Accueil" class="logo" src="images/logo.png" alt="logo"> </a>
				<a id = "macronmania" href="?action=Accueil"> Macronmania </a>
			</div>

			<form method = "get">
				<div class="formSearch">
					<input type="hidden" name="action" value="recherche" />
					<input type = "text" class="searchBar" placeholder="Recherche..." autocomplete="off" name = "termes" />
					<button class="search" type="submit"></button>
				</div>
		  	</form>


			<nav>
				<?php

					if(isset($_SESSION['id']) && $_SESSION['id'] == 1) {
						echo '<div><a href="?action=create">Ajouter un jeu</a></div>';
					}
					else echo '<div><a href="?controller=Client&action=Contact">Contact</a></div>';

				?>
				<div><?php if(isset($_SESSION['id'])) echo '<a href="?controller=Client&action=Compte">Mon compte</a>'; else echo '<a href="?controller=Client&action=Connexion">Se connecter</a>'; ?></div>
				<?php 

					if(isset($_SESSION['id']))
						echo '<div><a href="?controller=Client&action=Deconnexion">Deconnexion</a></div>';

				?>
			</nav>
		    
		    <a href='?action=panier'>PANIER</a>

		</header>

		<body>

			<cite><h3>Traversez la rue pour trouver le meilleur jeu de votre vie</h3></cite>

			<main>
				<div class="main">
			<?php
				$filepath = File::build_path(array("view", $controller, "$view.php"));
				require $filepath;
			?>
				</div>
			</main>
		</body>

		<footer>

		</footer>

	</html>
<!--***********************************************************************************************************-->
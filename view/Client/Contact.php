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

	<main class ="contact">

		<h1>Contact</h1>

		<form class = "formulaire" method ="post" action = "contact_cible.php">

			<div>
				<input class = "field" type = "text" name = "nom" placeholder = "*Nom" required>
			</div>

			<div>
				<input class = "field" type = "text" name = "prenom" placeholder = "*Prénom" required>
			</div>

			<div>
				<input class = "field" type = "text" name = "email" placeholder = "*Adresse Mail" required>
			</div>

			<div>
				<input class = "field" type = "text" name = "sujet" placeholder = "Sujet du message" required>
			</div>

			<div>
				<textarea  class = "message"  type = "text" name = "msg" placeholder = "Message..."></textarea>
			</div>

			<div>
				<input class = "bouton" type = "submit" value = "Valider">	
			</div>

		</form>


		

	</main>

</body>



</html>
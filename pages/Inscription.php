<?php 


			if (motDePasse != motDePasse2) {
				echo " mot de passe pas identique";
			} else {
				// Vérification de la validité des informations


				// Hachage du mot de passe

				$motDePasse = password_hash($_POST['motDePasse'], PASSWORD_DEFAULT);


				// Insertion

				$req = $bdd->prepare('INSERT INTO Clients(pseudoClient, nomClient, prenomClient, mailClient, motDePasse) VALUES(:pseudoClient, :nomClient, :prenomClient, :mailClient, :motDePasse)');

				$req->execute(array(

				    'pseudoClient' => $pseudoClient,

				    'nomClient' => $nomClient,

				    'prenomClient' => $prenomClient,

				    'mailClient' => $mailClient,

				    'motDePasse' => $motDePasse));
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


		<h1>Inscription</h1>

		<form method="post">

			<label>Nom: <input type="text" name="nomClient"/></label><br/>

			<label>Prenom: <input type="text" name="prenomClient"/></label><br/>

			<label>Pseudo: <input type="text" name="pseudoClient"/></label><br/>

			<label>Mot de passe: <input type="password" name="motDePasse"/></label><br/>

			<label>Confirmation du mot de passe: <input type="password" name="motDePasse2"/></label><br/>

			<label>Adresse e-mail: <input type="text" name="mailClient"/></label><br/>

			<input type="submit" value="M'inscrire"/>

		</form>

	


	</main>

</body>



</html>

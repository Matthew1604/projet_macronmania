<?php 
			try
				{
				 $bdd = new PDO("mysql:host=webinfo;dbname=vergelym", "vergelym", "123");
				 $bdd ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				}
				catch(Exception $e)
				{
				  die("Une érreur a été trouvé : " . $e->getMessage());
			}
				$bdd->query("SET NAMES UTF8");

/*			
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
*/

/*********************************************************************************************************************************************************/

				if ($_POST['mdp'] == $_POST['mdpVerif']) {
					header ('Location: Accueil.php');
					

					$sql = "INSERT INTO Clients(pseudoClient, nomClient, prenomClient, mailClient, motDePasse) VALUES(NULL, :pseudo, :nom, :prenom, :mail, :mdp)";
				  	$req_prep = $bdd->prepare($sql);

				    $pass_hach = password_hash($_POST['mdp'], PASSWORD_DEFAULT);

				  	$values = array(
				  		"pseudo" => $_POST['pseudo'],
				  		"nom" => $_POST['nom'],
				  		"prenom" => $_POST['prenom'] ,
				      	"mail" => $_POST['mail'],
				      	"mdp" => $pass_hach
				  	);

  					$req_prep -> execute($values);


					exit();
				} else {
					echo "Erreur : les 2 mots de passe ne sont pas identiques. <a href=\"Inscription.html\">Réessayez</a>";
				}
			
			
?>
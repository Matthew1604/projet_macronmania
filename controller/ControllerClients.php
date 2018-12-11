<?php

	require_once (File::build_path(array('model', 'ModelClients.php'))); // chargement du modèle

	class ControllerClients {
		protected static $object = 'Client';

		/************************************************************************************/

	    public static function Compte() {

	    	$pagetitle = 'MacronMania | Compte';
	    	$controller = 'Client';
	    	$view = 'Compte';
	        require(File::build_path(array('view', 'view.php')));
	    }

	    /************************************************************************************/

	    public static function Contact() {
	    	if (empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['mail']) || 
	    		empty($_POST['sujet']) || empty($_POST['msg'])) {
		    	$pagetitle = 'MacronMania | Contact';
		    	$controller = 'Client';
		    	$view = 'Contact';
		        require(File::build_path(array('view', 'view.php')));
		    }
		    else {
		    	$headers ='From: "' . $_POST["nom"] . ' ' . $_POST["prenom"] . '"<' . $_POST["mail"] . '>' . "\n";
			    $headers .='Content-Type: text/plain; charset="iso-8859-1"'."\n";
			    $headers .='Content-Transfer-Encoding: 8bit';

		    	$envoye = mail('vergely.matt@gmail.com', $_POST["sujet"], $_POST["msg"], $headers);
			    $pagetitle = 'MacronMania | Contact';
		    	$controller = 'Client';
		    	$view = 'Contact';
		        require(File::build_path(array('view', 'view.php')));
		    }
	    }

	    /************************************************************************************/

	    public static function Inscription() {
	    	if (empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['pseudo']) || 
	    		empty($_POST['mdp']) || empty($_POST['mdpVerif']) || empty($_POST['mail'])) {
		    	$pagetitle = 'MacronMania | Inscription';
		    	$controller = 'Client';
		    	$view = 'Inscription';
		    	require(File::build_path(array('view', 'view.php')));
		    }
		    else {
		    	if ($_POST['mdp'] == $_POST['mdpVerif']) {
		    		$pseudo = htmlspecialchars($_POST['pseudo']);
		    		$nom = htmlspecialchars($_POST['nom']);
		    		$prenom = htmlspecialchars($_POST['prenom']);
		    		$mail = htmlspecialchars($_POST['mail']);
		    		$mdp = htmlspecialchars($_POST['mdp']);
		    		$nonce = Security::generateRandomHex();

					$create = ModelClients::save(array('pseudoClient' => $pseudo,
													   'nomClient' => $nom,
													   'prenomClient' => $prenom,
													   'mailClient' => $mail,
													   'mdpClient' => Security::chiffrer($mdp),
													   'nonce' => $nonce ));
					if ($create == 'true') {

					    $headers ='Content-Type: text/html; charset="iso-8859-1"'."\n";
					    $headers .='Content-Transfer-Encoding: 8bit';

						$mailEnvoi = '<p>Bonjour, et merci de vous être inscrit sur notre site.</p>
						<p>Pour confirmer votre inscription, <a href="http://webinfo.iutmontp.univ-montp2.fr/~vergelym/projetPHP_v2/projet_macronmania/?controller=Clients&action=validate&pseudo=' . $pseudo . '&nonce=' . $nonce . 
						'">c\'est par ici !</a></p>
						<p>A bientôt sur notre site MacronMania ! Parce que c\'est notre projet !</p>';

						mail($mail, 'Merci de votre inscription', $mailEnvoi, $headers);

						$pagetitle = 'MacronMania | Inscription terminée';
				    	$controller = 'Client';
				    	$view = 'FinishInscription';
				        require(File::build_path(array('view', 'view.php')));
				    } else {
				    	if ($create == 20001) $msg = "Le pseudo est déjà utilisé !";
				    	else if ($create == 20002) $msg = "L'adresse e-mail est déjà utilisée sur un autre compte !";
				    	else $msg = "L'inscription n'a pas aboutie";

						$pagetitle = 'MacronMania | Inscription';
				    	$controller = 'Client';
				    	$view = 'Inscription';
						require (File::build_path(array('view', "view.php")));
				    }
				} else {
					$msg = "Les mots de passe doivent être les mêmes";

					$pagetitle = 'MacronMania | Inscription';
			    	$controller = 'Client';
			    	$view = 'Inscription';
					require (File::build_path(array('view', "view.php")));
				}
		    }
	    }

	    /************************************************************************************/

	    public static function validate() {
	    	$pseudo = $_GET['pseudo'];
	    	$nonce = $_GET['nonce'];
	    	$newUser = ModelClients::select($pseudo);

	    	if ($newUser == false) {
	    		$pagetitle = 'MacronMania | Erreur';
			    $controller = 'Jeux';
			    $view = 'Erreur';
				require (File::build_path(array('view', "view.php")));	
	    	} else {
		    	if ($newUser->getNonce() == $nonce) {
		    		$update = ModelClients::update(array('pseudoClient' => $pseudo, 'nonce' => NULL));
		    		if ($update == 'true') {
		    			$msg = "Votre compte est validé ! Il ne vous reste plus qu'à vous connecter";
		    			$pagetitle = 'MacronMania | Inscription validée';
					    $controller = 'Client';
					    $view = 'Connexion';
						require (File::build_path(array('view', "view.php")));
		    		} else {
		    			$pagetitle = 'MacronMania | Erreur';
					    $controller = 'Jeux';
					    $view = 'Erreur';
						require (File::build_path(array('view', "view.php")));
		    		}
		    	} else {
		    		$pagetitle = 'MacronMania | Erreur';
				    $controller = 'Jeux';
				    $view = 'Erreur';
					require (File::build_path(array('view', "view.php")));
		    	}
		    }
	    }

	    /************************************************************************************/

	    public static function Connexion() {
    		if (empty($_POST['pseudo']) || empty($_POST['mdp'])) {
	    		$pagetitle = 'MacronMania | Connexion';
	    		$controller = 'Client';
	    		$view = 'Connexion';
	    	    require(File::build_path(array('view', 'view.php')));
	    	}
	    	else {
	    		$user = ModelClients::connect($_POST['pseudo']);
	    		if ($user == false) {
	    			$connect = false;
	    			$msg = "Login ou mot de passe incorrect. Veuillez réessayer";
	    		} else if ($user[0]->getNonce() != NULL) {
	    			$connect = false;
	    			$msg = "Compte en attente de validation. Vérifiez vos mails !";
	    		}

	    		else {
	    			$user = $user[0];
	    			if ($user->getMdp() == Security::chiffrer($_POST['mdp'])) {
	    					    				
	    				session_start();
	    				$_SESSION['pseudo'] = $user->getPseudo();
	    				if ($_SESSION['pseudo'] == 'admin') $_SESSION['isAdmin'] = true;
	    				else $_SESSION['isAdmin'] = false;
	    				$_SESSION['nom'] = $user->getNom();
	    				$_SESSION['prenom'] = $user->getPrenom();
	    				$_SESSION['mail'] = $user->getMail();
	    				$_SESSION['mdp'] = $user->getMdp();
	    				$connect = true;

	    				require_once(File::build_path(array('model', 'ModelJeux.php')));
	    				$allJeux = ModelJeux::selectAll();
	    				$pagetitle = 'MacronMania | Accueil';
				        $controller = 'Client';
				        $view = 'Connected';
				        require (file::build_path(array('view', 'view.php')));
	    			}
	    			else {
	    				$connect = false;
	    				$msg = "Login ou mot de passe incorrect. Veuillez réessayer";
	    			}
	    		}
	    		if ($connect == false) {
		    		$pagetitle = 'MacronMania | Connexion';
				    $controller = 'Client';
				    $view = 'Connexion';
					require (File::build_path(array('view', "view.php")));
				}
	    	}
	    }

	    /************************************************************************************/

	    public static function Deconnexion() {
	    	session_start(); 
	    	session_unset();
			session_destroy();
			setcookie(session_name(),'',time()-1);

	    	require_once(File::build_path(array('model', 'ModelJeux.php')));
	    	$allJeux = ModelJeux::selectAll();
	    	$pagetitle = 'MacronMania | Accueil';
			$controller = 'Client';
			$view = 'Deconnected';
			require (file::build_path(array('view', 'view.php')));
	    }

		/************************************************************************************/

		public static function update() {
			session_start();
			$Client = ModelClients::select($_SESSION['pseudo']);
			$pseudo = $Client->getPseudo();
			$nom = $Client->getNom();
			$prenom = $Client->getPrenom();
			$mail = $Client->getMail();
			$mdp = $Client->getMdp();

			$action = 'updated';
			$pagetitle = 'MacronMania | Modifier mes informations';
	        $controller = 'Client';
	        $view = 'Update';
	    	require_once(file::build_path(array('view', 'view.php')));
	    }

		/************************************************************************************/

		public static function updated() {
			session_start();
			$maj = ModelClients::update(array('pseudoClient' => $_SESSION['pseudo'],
											  'nomClient' => htmlspecialchars($_GET['nom']),
											  'prenomClient' => htmlspecialchars($_GET['prenom']),
											  'mailClient' => htmlspecialchars($_GET['mail']) ));

			$client = ModelClients::select($_SESSION['pseudo']);
			$_SESSION['nom'] = $client->getNom();
			$_SESSION['prenom'] = $client->getPrenom();
			$_SESSION['mail'] = $client->getMail();

			if ($maj == 'true') {
				$msg = "<p>Vos informations ont bien été modifiés</p>";
			} else if($maj == '20002') {
				$msg = "<p>Erreur, l'adresse mail est déjà utilisée !";
			} else {
				$msg = "<p>Erreur, vos informations n'ont pas pu être modifiées</p>";
			}

			$pagetitle = 'MacronMania | Modifié';
	        $controller = 'Client';
	        $view = 'Updated';
	    	require_once(file::build_path(array('view', 'view.php')));
		}

		/************************************************************************************/

		public static function updateMdp() {
			session_start();
			$Client = ModelClients::select($_SESSION['pseudo']);
			$pseudo = $Client->getPseudo();

			$action = 'updatedMdp';
			$pagetitle = 'MacronMania | Modifier mot de passe';
	        $controller = 'Client';
	        $view = 'UpdateMdp';
	    	require_once(file::build_path(array('view', 'view.php')));
		}

		/************************************************************************************/

		public static function updatedMdp() {
			session_start();

			$Client = ModelClients::select($_SESSION['pseudo']);

			$ancienMdp = $Client->getMdp();
			$nouveauMdp = Security::chiffrer($_POST['nouveauMdp']);

			if ($ancienMdp != Security::chiffrer($_POST['ancienMdp']) || $_POST['nouveauMdp'] != $_POST['confirmMdp']) {
				$erreurMdp = true;

				$pagetitle = 'MacronMania | Modifier mot de passe';
		        $controller = 'Client';
		        $view = 'UpdateMdp';
		    	require_once(file::build_path(array('view', 'view.php')));
		    	return false;
			} else {
				$maj = ModelClients::update(array('pseudoClient' => $_SESSION['pseudo'],
												  'mdpClient' => htmlspecialchars($nouveauMdp) ));
			}

			$Client = ModelClients::select($_SESSION['pseudo']);
			$_SESSION['mdp'] = $Client->getMdp();

			if ($maj == 'true') {
				$msg = "<p>Le mot de passe a bien été modifié</p>";
			} else {
				$msg = "<p>Erreur, le mot de passe n'a pas été modifié</p>";
			}

			$pagetitle = 'MacronMania | Modifié';
	        $controller = 'Client';
	        $view = 'UpdatedMdp';
	    	require_once(file::build_path(array('view', 'view.php')));

		}

		/************************************************************************************/

		public static function delete() {
			session_start();
			$client = ModelClients::delete($_SESSION['pseudo']);
			 
	    	session_unset();
			session_destroy();

			$pagetitle = 'MacronMania | Supprimé';
	        $controller = 'Client';
	        $view = 'Deleted';
	    	require_once(file::build_path(array('view', 'view.php')));
		}

	}

?>

<?php

	require_once (File::build_path(array('model', 'ModelClient.php'))); // chargement du modèle

	class ControllerClient {
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
					$newClient = new ModelClient($_POST["pseudo"], $_POST["nom"], $_POST["prenom"], $_POST["mail"], $_POST["mdp"]);
					$newClient->create();
					$pagetitle = 'MacronMania | Inscription terminée';
			    	$controller = 'Client';
			    	$view = 'FinishInscription';
			        require(File::build_path(array('view', 'view.php')));
				} else {
					$inscrip = false;
					$pagetitle = 'MacronMania | Inscription';
			    	$controller = 'Client';
			    	$view = 'Inscription';
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
	    		$user = ModelClient::connect($_POST['pseudo']);
	    		if ($user == false) {
	    			$connect = false;
	    		} else {
	    			$user = $user[0];
	    			if ($user->getMdp() == hash('sha256', $_POST['mdp'])) {
	    				/**** TODO TD7 SESSIONS ****/
	    				
	    				session_start();
	    				$_SESSION['id'] = $user->getId();
	    				$_SESSION['pseudo'] = $user->getPseudo();
	    				$_SESSION['nom'] = $user->getNom();
	    				$_SESSION['prenom'] = $user->getPrenom();
	    				$_SESSION['mail'] = $user->getMail();
	    				$_SESSION['mdp'] = $user->getMdp();
	    				$connect = true;

	    				require_once(File::build_path(array('model', 'ModelJeux.php')));
	    				$allJeux = ModelJeux::selectAll();
	    				$pagetitle = 'MacronMania | Accueil';
				        $controller = 'Jeux';
				        $view = 'Accueil';
				        require (file::build_path(array('view', 'view.php')));
	    			}
	    			else {
	    				$connect = false;
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

	    public static function Deconnexion() {
	    	session_start(); 
	    	session_unset();
			session_destroy();

	    	require_once(File::build_path(array('model', 'ModelJeux.php')));
	    	$allJeux = ModelJeux::selectAll();
	    	$pagetitle = 'MacronMania | Accueil';
			$controller = 'Jeux';
			$view = 'Accueil';
			require (file::build_path(array('view', 'view.php')));
	    }

	}

?>

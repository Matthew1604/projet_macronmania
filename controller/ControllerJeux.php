<?php

	require_once (File::build_path(array('model', 'ModelJeux.php'))); // chargement du modèle

	class ControllerJeux {
		protected static $object = 'Jeux';

		/************************************************************************************/

	    public static function Accueil() {
	       	$allJeux = ModelJeux::selectAll();  //appel au modèle pour gerer la BD

	        $pagetitle = 'MacronMania | Accueil';
	        $controller = 'Jeux';
	        $view = 'Accueil';
	        require_once(file::build_path(array('view', 'view.php')));  //"redirige" vers la vue
	    }

	    /************************************************************************************/

	    public static function recherche() {
	    	$resRecherche = ModelJeux::search();

	    	$pagetitle = 'MacronMania | Recherche';
	        $controller = 'Jeux';
	        $view = 'ResultatRecherche';
	    	require_once(file::build_path(array('view', 'view.php')));
	    }

	    /************************************************************************************/

	    public static function panier() {
	    	if (isset($_COOKIE['panier']) && isset($_COOKIE['qtt'])) {
		    	$panier = unserialize($_COOKIE['panier']);
		    	$listeJeux = array();
		    	foreach ($panier as $value) {
		    		array_push($listeJeux, ModelJeux::select($value));
		    	}
		    	$quantite = unserialize($_COOKIE['qtt']);
		    } 

	    	$pagetitle = 'MacronMania | Panier';
	        $controller = 'Jeux';
	        $view = 'Panier';
	    	require_once(file::build_path(array('view', 'view.php')));
	    }

	    /************************************************************************************/

	    public static function addCart() {
	    	if (!isset($_COOKIE['panier']) || !isset($_COOKIE['qtt'])) {
	    		$panier = array($_GET['id']);
	    		$quantite = array($_GET['id'] => 1);
	    		$panier = serialize($panier);
	    		$quantite = serialize($quantite);
	    		setcookie("panier", $panier, time() + 86400);
	    		setcookie("qtt", $quantite, time() + 86400);
	    	}
	    	else {
	    		$panier = unserialize($_COOKIE['panier']);
	    		$quantite = unserialize($_COOKIE['qtt']);

	    		if (isset($quantite[$_GET['id']])) {
	    			$quantite[$_GET['id']] += 1;
	    		} else {
	    			$quantite[$_GET['id']] = 1;
	    			array_push($panier, $_GET['id']);
				}
	    		
	    		$panier = serialize($panier);
	    		$quantite = serialize($quantite);
	    		setcookie("panier", $panier, time() + 86400);
	    		setcookie("qtt", $quantite, time() + 86400);
	    	}

	    	self::read();
	    }

	    /************************************************************************************/

	    public static function delCart() {
	    	$panier = unserialize($_COOKIE['panier']);
	    	$quantite = unserialize($_COOKIE['qtt']);

	    	if ($quantite[$_GET['id']] > 1) {
	    		$quantite[$_GET['id']] -= 1;
	    	} else {
	    		unset($panier[array_search($_GET['id'], $panier)]);
	    		unset($quantite[$_GET['id']]);
	    	}

	    	$panier = serialize($panier);
    		$quantite = serialize($quantite);
    		setcookie("panier", $panier, time() + 86400);
    		setcookie("qtt", $quantite, time() + 86400);

	    	$pagetitle = 'MacronMania | Panier';
	        $controller = 'Jeux';
	        $view = 'DelPanier';
	    	require_once(file::build_path(array('view', 'view.php')));
	    }

		/************************************************************************************/

		public static function delAllCart() {
			setcookie("panier", '', time() - 1);
    		setcookie("qtt", '', time() - 1);

    		$pagetitle = 'MacronMania | Panier';
	        $controller = 'Jeux';
	        $view = 'DelPanier';
	    	require_once(file::build_path(array('view', 'view.php')));
		}	    

	    /************************************************************************************/

	    public static function read() {
	    	if ($_GET['action'] == 'addCart') $msg = '<p style="text-align:center">Ajouté au panier ! Parce que c\'est notre projet</p>';
	    	$Jeu = ModelJeux::select($_GET['id']);
	    	$idJeu = $Jeu->getId();
	    	$nomJeu = $Jeu->getNomJeu();
	    	$plateforme = $Jeu->getPlateforme();
	    	$genre = $Jeu->getGenre();
	    	$image = $Jeu->getImage();
	    	$prix = $Jeu->getPrix();
	    	$note = $Jeu->getNote();

	    	$pagetitle = 'MacronMania | Description';
	    	$controller = 'Jeux';
	    	$view = 'Read';
	    	require_once(file::build_path(array('view', 'view.php')));
	    }

	    /************************************************************************************/

	    public static function create() {
	    	$nomJeu = '';
	    	$plateforme = '';
	    	$genre = '';
	    	$note = '';
	    	$prix = '';
	    	$image = '';

	    	$action = 'created';
	    	$pagetitle = 'MacronMania | Créer';
	    	$controller = 'Jeux';
	    	$view = 'Update';
	    	require_once(file::build_path(array('view', 'view.php')));
	    }

	    /************************************************************************************/

	    public static function created() {
	    	$save = ModelJeux::save(array('idJeu' => NULL,
	    								  'nomJeu' => htmlspecialchars($_GET['nom']),
									   	  'plateforme' => htmlspecialchars($_GET['plateforme']),
									   	  'genre' => htmlspecialchars($_GET['genre']),
									   	  'image' => htmlspecialchars($_GET['image']),
									   	  'noteSur5' => htmlspecialchars($_GET['note']),
									   	  'prix' => htmlspecialchars($_GET['prix'])));

	    	if ($save == true) {
	    		$msg = "Le jeu a bien été ajouté";
	    	} else {
	    		$msg = "Erreur, le jeu n'a pas été créé";
	    	}
	    	$pagetitle = 'MacronMania | Créé';
		    $controller = 'Jeux';
		    $view = 'Created';
		    require_once(file::build_path(array('view', 'view.php')));
	    }

	    /************************************************************************************/

	    public static function update() {
	    	$Jeu = ModelJeux::select($_GET['id']);
	    	$nomJeu = $Jeu->getNomJeu();
	    	$plateforme = $Jeu->getPlateforme();
	    	$genre = $Jeu->getGenre();
	    	$image = $Jeu->getImage();
	    	$prix = $Jeu->getPrix();
	    	$note = $Jeu->getNote();

	    	$action = 'updated';
	    	$pagetitle = 'MacronMania | Modifier';
	        $controller = 'Jeux';
	        $view = 'Update';
	    	require_once(file::build_path(array('view', 'view.php')));
	    }

		/************************************************************************************/

		public static function updated() {
			$maj = ModelJeux::update(array('idJeu' => $_GET['id'],
										   'nomJeu' => $_GET['nom'],
										   'plateforme' => $_GET['plateforme'],
										   'genre' => $_GET['genre'],
										   'image' => $_GET['image'],
										   'noteSur5' => $_GET['note'],
										   'prix' => $_GET['prix']));

			if ($maj == 'true') {
				$msg = "Le jeu à bien été modifié.";
			} else {
				$msg = "Erreur, les modifications n'ont pas été prise en compte";
			}

			$pagetitle = 'MacronMania | Modifié';
	        $controller = 'Jeux';
	        $view = 'Updated';
	    	require_once(file::build_path(array('view', 'view.php')));
		}	    

	    /************************************************************************************/

	    public static function delete() {
	    	if(ModelJeux::delete($_GET['id'])) {
	    		$msg = "Le jeu a bien été supprimé";
	    	} else {
	    		$msg = "Erreur, le jeu n'a pas été supprimé";
	    	}
	    	$pagetitle = 'MacronMania | Supprimé';
	        $controller = 'Jeux';
	        $view = 'Delete';
	    	require_once(file::build_path(array('view', 'view.php')));
	    }

	}

?>

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
	        require (file::build_path(array('view', 'view.php')));  //"redirige" vers la vue
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

	    public static function read() {
	    	$Jeu = ModelJeux::select($_GET['id']);
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


	    	$pagetitle = 'MacronMania | Créer';
	    	$controller = 'Jeux';
	    	$view = 'Create';
	    	require_once(file::build_path(array('view', 'view.php')));
	    }

	    /************************************************************************************/

	    public static function created() {
	    	$Jeu = new ModelJeux($_GET['nom'], $_GET['plateforme'], $_GET['genre'], $_GET['image'], $_GET['note'], $_GET['prix']);
	    	if ($Jeu->save()) {
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

	    	$pagetitle = 'MacronMania | Modifier';
	        $controller = 'Jeux';
	        $view = 'Update';
	    	require_once(file::build_path(array('view', 'view.php')));
	    }

		/************************************************************************************/

		public static function updated() {
			$maj = ModelJeux::update(array('id' => $_GET['id'],
										   'nom' => $_GET['nom'],
										   'plateforme' => $_GET['plateforme'],
										   'genre' => $_GET['genre'],
										   'image' => $_GET['image'],
										   'note' => $_GET['note'],
										   'prix' => $_GET['prix']));

			if ($maj) {
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
	    	if(ModelJeux::deleteById($_GET['id'])) {
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

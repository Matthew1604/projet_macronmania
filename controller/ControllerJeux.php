<?php

	require_once (File::build_path(array('model', 'ModelJeux.php'))); // chargement du modèle

	class ControllerJeux {

		/************************************************************************************/

	    public static function Accueil() {
	        $allJeux = ModelJeux::getAllNomJeux();  //appel au modèle pour gerer la BD
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
	}

?>

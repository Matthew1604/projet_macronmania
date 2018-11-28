<?php

	require_once (File::build_path(array('model', 'ModelJeux.php'))); // chargement du modèle

	class ControllerJeux {

		/************************************************************************************/

	    public static function Accueil() {
	        $allJeux = ModelJeux::getAllNomJeux();  //appel au modèle pour gerer la BD
	        require (file::build_path(array('view', 'Jeux', 'Accueil.php')));  //"redirige" vers la vue
	    }

	    /************************************************************************************/

	    public static function recherche() {
	    	$resRecherche = ModelJeux::search();
	    	require_once(file::build_path(array('view', 'Jeux', 'ResultatRecherche.php')));
	    }
	}

?>

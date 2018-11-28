<?php

	require_once (File::build_path(array('model', 'ModelClient.php'))); // chargement du modèle

	class ControllerClient {

		/************************************************************************************/

	    public static function Compte() {
	        require(File::build_path(array('view', 'Client', 'Compte.php')));
	    }
	}

?>

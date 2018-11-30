<?php

	require_once(File::build_path(array('controller', 'ControllerJeux.php')));
	
	if (isset($_GET['action']) == false) {
		ControllerJeux::Accueil();
	}
	else {
		$action = $_GET['action'];
		$exist = in_array($action, get_class_methods('ControllerJeux'));
		if ($exist == false) {
			$pagetitle = 'Macronmania | Erreur';
			$controller = 'Jeux';
			$view = 'Erreur';
			require(File::build_path(array('view', 'view.php')));
		}
		else {
			ControllerJeux::$action();
		}
	}

?>

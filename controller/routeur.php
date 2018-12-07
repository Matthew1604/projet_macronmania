<?php

	require_once(File::build_path(array('controller', 'ControllerJeux.php')));
	require_once(File::build_path(array('controller', 'ControllerClient.php')));
	
	if (!isset($_GET['controller'])) {
		$controller = 'Jeux';
	} 
	else {
		$controller = $_GET['controller'];
	}
	$controllerClass = 'controller'.ucfirst($controller);

	if (class_exists($controllerClass)) {
		if (!isset($_GET['action'])) {
			ControllerJeux::Accueil();
		}
		else {
			$action = $_GET['action'];
			$exist = in_array($action, get_class_methods($controllerClass));
			if (!$exist) {
				$pagetitle = 'Macronmania | Erreur';
				$controller = 'Jeux';
				$view = 'Erreur';
				require(File::build_path(array('view', 'view.php')));
			} 
			else {
				$controllerClass::$action();
			}
		}
	}
	else {
		$pagetitle = 'Macronmania | Erreur';
		$controller = 'Jeux';
		$view = 'Erreur';
		require(File::build_path(array('view', 'view.php')));
	}

?>

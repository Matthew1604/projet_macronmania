<h1>Supprimé</h1>

<?php 
	if ($_GET['action'] == 'delAllCart')
		echo '<p>Panier vidé. <a href="?action=Accueil">Retourner à l\'accueil</a></p>';
	else 
		echo '<p>Article retiré. <a href="?action=panier">Retourner au panier</a></p>';
?>
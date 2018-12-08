<h1><?php echo $nomJeu ?></h1>

<?php
	
	echo '<img src="' . $image . '" />';
	echo '<p>Nom : ' . $nomJeu . '</p>';
	echo '<p>Plateforme : ' . $plateforme . '</p>';
	echo '<p>Genre : ' . $genre . '</p>';
	echo '<p>Note : ' . $note . ' / 5</p>';
	echo '<p>Prix : ' . $prix . '€</p>';

	if (isset($_SESSION['id']) && $_SESSION['isAdmin']) {
		echo '<p>[<a href="?action=update&id=' . $_GET['id'] . '"> Modifier </a>] [<a href="?action=delete&id=' . $_GET['id'] . '"> Supprimer </a>]</p>';
	}

?>

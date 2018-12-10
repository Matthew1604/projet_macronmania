<h1><?php echo $nomJeu ?></h1>

<div class="readJeu">

<?php
	
	echo '<div><img src="' . $image . '" /></div>';
	echo '<div><p>Nom : ' . $nomJeu . '</p>';
	echo '<p>Plateforme : ' . $plateforme . '</p>';
	echo '<p>Genre : ' . $genre . '</p>';
	echo '<p>Note : ' . $note . ' / 5</p>';
	echo '<p>Prix : ' . $prix . '€</p></div>';

	if (isset($_SESSION['pseudo']) && $_SESSION['isAdmin']) {
		echo '<p>[<a href="?action=update&id=' . $_GET['id'] . '"> Modifier </a>] [<a href="?action=delete&id=' . $_GET['id'] . '"> Supprimer </a>]</p>';
	}

?>

</div>

<form class="ajoutPanier">
	<input type="hidden" name="action" value="addCart">
	<input class="field" type="submit" value="Ajouter au panier">
</form>
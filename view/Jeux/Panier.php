<h1>Panier</h1>



<?php 
	
	if (empty($listeJeux)) echo "<p>Le panier est vide. Il est temps de faire des achats !</p>";
	else {

		echo '<div class="gridJeux">';

		foreach ($listeJeux as $jeu) {
			echo '<div><a href="?action=read&id=' . $jeu->getId() . '"><img src="' . $jeu->getImage() . 
			'" /></a><br /><p><a class="nomJeu" href="?action=read&id=' . $jeu->getId() . '">' . $jeu->getNomJeu() . " | " . 
			$jeu->getPlateforme() . "</a></p>";

			echo '<a href="?action=delCart&id=' . $jeu->getId() . '" style="color:red">Retirer du panier</a></div>';
		}

		echo "</div>";

	}
?>

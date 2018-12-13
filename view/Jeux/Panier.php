<h1>Panier</h1>

<?php 

	$prixTotal = 0;
	if (!isset($listeJeux) || empty($listeJeux)) echo "<p>Le panier est vide. Il est temps de faire des achats !</p>";
	else {

		echo '<div class="gridJeux">';

		foreach ($listeJeux as $jeu) {
			$prixTotal += $jeu->getPrix() * $quantite[$jeu->getId()];

			echo '<div><span class="qttJeu">' . $quantite[$jeu->getId()] . 'x </span><a href="?action=read&id=' . $jeu->getId() . 
			'"><img alt="imgJeu" src="' . $jeu->getImage() . '" /></a><br /><p><a class="nomJeu" href="?action=read&id=' . $jeu->getId() . 
			'">' . $jeu->getNomJeu() . " | " . $jeu->getPlateforme() . "</a></p>";

			echo '<a href="?action=delCart&id=' . $jeu->getId() . '" style="color:red">Retirer du panier</a></div>';
		}

		echo "</div>";

		echo '<div class="prix"><p>Prix total : ' . $prixTotal . '€</p></div>';

		echo '<form style="margin-top: 50px; text-align: center">
			  	  <input type="hidden" name="action" value="delAllCart" />
			  	  <input class="field" type="submit" value="Vider mon panier" />
			  </form>';

	}

?>


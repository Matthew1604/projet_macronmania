<h1>Panier</h1>

<?php 
	
	if (!isset($listeJeux) || empty($listeJeux)) echo "<p>Le panier est vide. Il est temps de faire des achats !</p>";
	else {

		echo '<div class="gridJeux">';

		foreach ($listeJeux as $jeu) {
			echo '<div><span class="qttJeu">' . $quantite[$jeu->getId()] . 'x </span><a href="?action=read&id=' . $jeu->getId() . 
			'"><img src="' . $jeu->getImage() . '" /></a><br /><p><a class="nomJeu" href="?action=read&id=' . $jeu->getId() . 
			'">' . $jeu->getNomJeu() . " | " . $jeu->getPlateforme() . "</a></p>";

			echo '<a href="?action=delCart&id=' . $jeu->getId() . '" style="color:red">Retirer du panier</a></div>';
		}

		echo "</div>";

		echo '<form style="margin-top: 20px; text-align: center">
			  	  <input type="hidden" name="action" value="delAllCart" />
			  	  <input class="field" type="submit" value="Vider mon panier" />
			  </form>';

	}
?>


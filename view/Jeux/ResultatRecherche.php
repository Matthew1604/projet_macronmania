<h1>Résultats de recherche</h1>

<?php

	if ($resRecherche == false)
		echo '<h2 class="noResult">Pas de resultats</h2>
			  <div style="text-align: center"><img alt="no-se" id="no-se" src="images/no-se.jpg" /></div>';
	else {
		echo '<div class = "gridJeux">';
		foreach ($resRecherche as $v) {
		 	echo '<div><a href="?action=read&id=' . $v->getId() . '"><img alt="imgJeu" src="' . $v->getImage() . '" /></a><br /><a href="?action=read&id=' . $v->getId() . '"><p class="nomJeu">' . $v->getNomJeu() . ' | ' . $v->getPlateforme() . '</p></a></div>';
		}
		echo '</div>';
	}

?>
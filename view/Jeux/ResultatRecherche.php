<h1>Résultats de recherche</h1>

<?php

	if ($resRecherche == false)
		echo '<h2 class="noResult">Pas de resultats</h2>
			  <div style="text-align: center"><img id="no-se" src="images/no-se.jpg" /></div>';
	else {
		echo '<div class = "resJeux">';
		foreach ($resRecherche as $v) {
		 	echo '<div class = "imgNomJeux"><img src="' . $v->getImage() . '" /><br /><p>' . $v->getNomJeu() . ' | ' . $v->getPlateforme() . '</p></div>';
		}
		echo '</div>';
	}

?>
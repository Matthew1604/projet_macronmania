<h1>Résultats de recherche</h1>

<div class="select-genre">
  <select>
    <option value="0">Genre</option>
    <option value="1">Audi</option>
    <option value="2">BMW</option>
    <option value="3">Citroen</option>
    <option value="4">Ford</option>
    <option value="5">Honda</option>
    <option value="6">Jaguar</option>
  </select>
</div>

<?php

	if ($resRecherche == false)
		echo '<h2 class="noResult">Pas de resultats</h2>
			  <img id="no-se" src="images/no-se.jpg" />';
	else {
		echo '<div class = "resJeux">';
		foreach ($resRecherche as $v) {
		 	echo '<div class = "imgNomJeux"><img src="' . $v->getImage() . '" /><br /><p>' . $v->getNomJeu() . ' | ' . $v->getPlateforme() . '</p></div>';
		}
		echo '</div>';
	}

?>
<h1>Résultats de recherche</h1>

<div class="select">
  <select id="genre" name="genre">
    <option value="0">--Genre--</option>
    <option value="Action / Aventure">Action / Aventure</option>
    <option value="Course">Course</option>
    <option value="FPS">FPS</option>
    <option value="Sport">Sport</option>
    <option value="Gestion">Gestion</option>
    <option value="Activités récréatives">Activités récréatives</option>
  </select>

  <select id="ordre" name="ordre">
    <option value="1">Alphabétique</option>
    <option value="2">Prix</option>
    <option value="3">Notes</option>
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
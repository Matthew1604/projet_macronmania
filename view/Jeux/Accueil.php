<h1>MacronMania | Accueil</h1>
<h2 class="welcome">Bienvenue sur votre site de vente de jeux en ligne MacronMania !</h2>
<h3 class="welcome">Parce que c'est notre projet !</h3>

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

	foreach ($allJeux as $v) {
		echo "<p>" . $v['nomJeu'] . " | " . $v['plateforme'] . "</p>";
	}

?>
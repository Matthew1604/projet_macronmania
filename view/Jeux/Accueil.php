<h1>MacronMania | Accueil</h1>
<h2 class="welcome">Bienvenue sur votre site de vente de jeux en ligne MacronMania !</h2>
<h3 class="welcome">Parce que c'est notre projet !</h3>

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
  
	foreach ($allJeux as $v) {

		echo "<p>" . $v['nomJeu'] . " | " . $v['plateforme'];

    if (isset($_SESSION['id']) && $_SESSION['id'] == 1)
      echo '<a href="?action=Update"> [Modifier] </a><a href="?action=Delete"> [Supprimer] </a></p>';
    else
      echo "</p>";

	}

?>
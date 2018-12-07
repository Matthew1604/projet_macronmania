<h1>MacronMania | Accueil</h1>
<h2 class="welcome">Bienvenue sur votre site de vente de jeux en ligne MacronMania !</h2>
<h3 class="welcome">Parce que c'est notre projet !</h3>
<h4>Tous les jeux :</h4>

<?php
  
	foreach ($allJeux as $v) {

		echo '<p><a class="nomJeux" href="?action=read&id=' . $v->getId() . '">' . $v->getNomJeu() . "</a> | " . $v->getPlateforme();

    if (isset($_SESSION['id']) && $_SESSION['id'] == 1)
      echo ' [<a href="?action=update&id=' . $v->getId() . '"> Modifier </a>] [<a href="?action=delete&id=' . $v->getId() . '"> Supprimer </a>]</p>';
    else
      echo "</p>";

	}

?>
<h1>MacronMania | Accueil</h1>
<h2 class="welcome">Bienvenue sur votre site de vente de jeux en ligne MacronMania !</h2>
<h3 class="welcome">Parce que c'est notre projet !</h3>
<h4>Tous les jeux :</h4>

<div class="gridJeux">

<?php
  
	foreach ($allJeux as $v) {

		echo '<div><a href="?action=read&id=' . $v->getId() . '"><img src="' . $v->getImage() . '" /></a><br /><p><a class="nomJeu" href="?action=read&id=' . $v->getId() . '">' . $v->getNomJeu() . "</a> | " . $v->getPlateforme();

    if (isset($_SESSION['pseudo']) && $_SESSION['isAdmin'])
      echo ' [<a href="?action=update&id=' . $v->getId() . '"> Modifier </a>] [<a href="?action=delete&id=' . $v->getId() . '"> Supprimer </a>]</p></div>';
    else
      echo "</p></div>";

	}

?>

</div>
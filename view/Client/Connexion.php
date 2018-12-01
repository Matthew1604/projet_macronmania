<h1>Connexion</h1>

<form class="formulaire" method="post">

	<input class="field" type="text" name="pseudo" placeholder="Pseudo">
	<input class="field" type="password" name="mdp" placeholder="Mot de passe">
	<?php

		if (isset($connect) == true) {
			if (!$connect)
				echo '<p>Login ou mot de passe incorrect. Veuillez réessayer ou <a href="?action=Inscription">inscrivez-vous ici</a>.</p>';
		}

	?>
	<input class="field" type="submit" value="Se connecter">

</form>
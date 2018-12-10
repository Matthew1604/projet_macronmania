<h1>Connexion</h1>

<form class="formulaire" method="post" action="?controller=Clients&action=Connexion">
	<input class="field" type="text" name="pseudo" placeholder="Pseudo">
	<input class="field" type="password" name="mdp" placeholder="Mot de passe">
	<?php

		if (isset($msg))
			echo "<p>$msg</p>";

	?>
	<input class="field" type="submit" value="Se connecter">
	<p>Pas de compte ? <a href="?controller=Clients&action=Inscription">S'inscrire immédiatement !</a></p>

</form>
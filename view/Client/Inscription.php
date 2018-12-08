<h1>Inscription</h1>

<form class="formulaire" action="" method="post">

	<input class="field" type="text" name="nom" placeholder="*Nom" /><br/>

	<input class="field" type="text" name="prenom" placeholder="*Prenom" /><br/>

	<input class="field" type="text" name="pseudo" placeholder="*Pseudo" /><br/>

	<input class="field" type="password" name="mdp" placeholder="*Mot de passe" /><br/>

	<input class="field" type="password" name="mdpVerif" placeholder="*Confirmer mot de passe" /><br/>

	<input class="field" type="text" name="mail" placeholder="*E-mail" /><br/>

	<?php 

		if (isset($inscrip)) {
			if (!$inscrip)
				echo "<p>Erreur : L'inscription n'a pas aboutie</p>";
		}

	?>

	<input class="field" type="submit" value="M'inscrire"/>

</form>
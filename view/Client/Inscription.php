<h1>Inscription</h1>

<form class="formulaire" action="" method="post">

	<input class="field" type="text" name="nom" placeholder="*Nom" <?php if (isset($_POST['nom'])) echo 'value="' . $_POST['nom'] . '"'; ?> /><br/>

	<input class="field" type="text" name="prenom" placeholder="*Prenom" <?php if (isset($_POST['prenom'])) echo 'value="' . $_POST['prenom'] . '"'; ?> /><br/>

	<input class="field" type="text" name="pseudo" placeholder="*Pseudo" <?php if (isset($_POST['pseudo'])) echo 'value="' . $_POST['pseudo'] . '"'; ?> /><br/>

	<input class="field" type="password" name="mdp" placeholder="*Mot de passe" /><br/>

	<input class="field" type="password" name="mdpVerif" placeholder="*Confirmer mot de passe" /><br/>

	<input class="field" type="email" name="mail" placeholder="*E-mail" <?php if (isset($_POST['mail'])) echo 'value="' . $_POST['mail'] . '"'; ?> /><br/>

	<?php if (isset($msg)) echo "<p>Erreur : $msg</p>"; ?>

	<input class="field" type="submit" value="M'inscrire"/>

</form>
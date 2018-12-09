<h1>Modifier mot de passe</h1>

<form class="formulaire" action="?controller=Clients&action=updatedMdp" method="post">

	<input class="field" type="password" name="ancienMdp" placeholder="Ancien mot de passe" /> <br />

	<input class="field" type="password" name="nouveauMdp" placeholder="Nouveau mot de passe" /> <br />

	<input class="field" type="password" name="confirmMdp" placeholder="Confirmer nouveau mot de passe" /> <br />

	<?php if(isset($erreurMdp) && $erreurMdp) echo "<p>Erreur, le mot de passe n'a pas été modifié</p>"; ?>

	<input class="field" type="submit" value="Modifier"/>

</form>
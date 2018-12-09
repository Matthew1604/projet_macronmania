<h1>Mon compte</h1>

<h2>Mes informations</h2>

<div class="info">
	<ul class="listeInfo">
		<li>Nom : <?php echo $_SESSION['nom'] ?></li>
		<li>Prenom : <?php echo $_SESSION['prenom'] ?></li>
		<li>Pseudo : <?php echo $_SESSION['pseudo'] ?></li>
		<li>Adresse e-mail : <?php echo $_SESSION['mail'] ?></li>
		<li>Mot de passe : ********</li>
	</ul>

	<form>
		<input type="hidden" name="controller" value="Clients" />
		<input type="hidden" name="action" value="update" />

		<input class="modifClient" type="submit" value="Modifier mes informations" />
	</form>
	<form>
		<input type="hidden" name="controller" value="Clients" />
		<input type="hidden" name="action" value="updateMdp" />

		<input class="modifClient" type="submit" value="Modifier le mot de passe" />
	</form>

</div>
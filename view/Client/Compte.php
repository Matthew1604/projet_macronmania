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
	<ul class="listeButton">
		<li><button class="modifyButton" type="button" >Modifier</button></li>
		<li><button class="modifyButton" type="button" >Modifier</button></li>
		<li><button class="modifyButtonDisabled" type="button" disabled>Modifier</button></li>
		<li><button class="modifyButton" type="button" >Modifier</button></li>
		<li><button class="modifyButton" type="button" >Modifier</button></li>
	</ul>
</div>
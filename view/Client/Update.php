<h1>Modifier mes informations</h1>

<form class="formulaire" action="" method="get">

	<input type="hidden" name="controller" value="Clients" />
	<input type="hidden" name="action" value="updated" />

	<input class="field" type="text" name="nom" <?php echo 'value="' . $nom . '"'; ?> /><br/>

	<input class="field" type="text" name="prenom" <?php echo 'value="' . $prenom . '"'; ?> /><br/>

	<input class="fieldReadonly" type="text" name="pseudo" <?php echo 'value="' . $pseudo . '"'; ?> readonly /><br/>

	<input class="field" type="email" name="mail" <?php echo 'value="' . $mail . '"'; ?> /><br/>
	
	<input class="field" type="submit" value="Modifier"/>

</form>
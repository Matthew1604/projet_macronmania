
<h1>Contact</h1>

<form class = "formulaire" method ="post" action = "">

	<div>
		<input class = "field" type = "text" name = "nom" placeholder = "*Nom" <?php if(isset($_SESSION['id'])) echo ' value = "' . $_SESSION['nom'] . '"'; ?> required>
	</div>

	<div>
		<input class = "field" type = "text" name = "prenom" placeholder = "*Prénom" <?php if(isset($_SESSION['id'])) echo ' value = "' . $_SESSION['prenom'] . '"'; ?> required>
	</div>

	<div>
		<input class = "field" type = "email" name = "mail" placeholder = "*Adresse Mail" <?php if(isset($_SESSION['id'])) echo ' value = "' . $_SESSION['mail'] . '"'; ?> required>
	</div>

	<div>
		<input class = "field" type = "text" name = "sujet" placeholder = "Sujet du message" required>
	</div>

	<div>
		<textarea  class = "message"  type = "text" name = "msg" placeholder = "Message..."></textarea>
	</div>

	<?php

		if (isset($envoye) == true) {
			if ($envoye)
				echo "<p>Le message à bien été envoyé. Merci !</p>";
			else
				echo "<p>Désolé, un problème est survenu. Le message n'a pas pu être envoyé</p>";
		}

	?>

	<div>
		<input class = "field" type = "submit" value = "Valider">	
	</div>

</form>
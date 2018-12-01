
<h1>Contact</h1>

<form class = "formulaire" method ="post" action = "">

	<div>
		<input class = "field" type = "text" name = "nom" placeholder = "*Nom" required>
	</div>

	<div>
		<input class = "field" type = "text" name = "prenom" placeholder = "*Prénom" required>
	</div>

	<div>
		<input class = "field" type = "text" name = "mail" placeholder = "*Adresse Mail" required>
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
		<input class = "bouton" type = "submit" value = "Valider">	
	</div>

</form>
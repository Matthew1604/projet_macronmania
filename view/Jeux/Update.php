<h1><?php if($action == "updated") echo "Modifier"; else echo "Ajouter un jeu"; ?></h1>

<form class="formulaire">

	<input type="hidden" name="action" <?php echo 'value="' . $action . '"'; ?> />
	<?php if (isset($_GET['id'])) echo '<input type="hidden" name="id" value="' . $_GET['id'] . '" />'; ?>

	<input class="field" type="text" name="nom" placeholder="Nom du jeu" <?php echo 'value="' . $nomJeu . '"'; ?> /><br/>

	<select class="field" id="plateforme" name="plateforme">
		<option value="0">--Plateforme--</option>
	    <option value="PS4" <?php if ($plateforme == "PS4") echo "selected" ?> >PS4</option>
	    <option value="Xbox One" <?php if ($plateforme == "Xbox One") echo "selected" ?> >Xbox One</option>
  	</select><br/>

	<select class="field" id="genre" name="genre">
		<option value="0">--Genre--</option>
	    <option value="Action / Aventure" <?php if ($genre == "Action / Aventure") echo "selected" ?> >Action / Aventure</option>
	    <option value="Course" <?php if ($genre == "Course") echo "selected" ?> >Course</option>
	    <option value="FPS" <?php if ($genre == "FPS") echo "selected" ?> >FPS</option>
	    <option value="Sport" <?php if ($genre == "Sport") echo "selected" ?> >Sport</option>
	    <option value="Gestion" <?php if ($genre == "Gestion") echo "selected" ?> >Gestion</option>
	    <option value="Activités récréatives" <?php if ($genre == "Activités récréatives") echo "selected" ?> >Activités récréatives</option>
  	</select><br/>

	<input class="field" type="text" name="note" placeholder="Note" <?php echo 'value="' . $note . '"'; ?> /><br/>

	<input class="field" type="text" name="prix" placeholder="Prix" <?php echo 'value="' . $prix . '"'; ?> /><br/>

	<input class="field" type="text" name="image" placeholder="Lien vers l'image" <?php echo 'value="' . $image . '"'; ?> /><br/>

	<input class="field" type="submit" <?php if($action == "updated") echo 'value="Modifier"'; else echo 'value="Ajouter"'; ?> />

</form>
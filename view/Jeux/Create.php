<h1>Ajouter un jeu</h1>

<form class="formulaire" action="" method="get">

	<input class="field" type="hidden" name="action" value="created" />

	<input class="field" type="text" name="nom" placeholder="Nom du jeu" /><br/>

	<select id="plateforme" name="plateforme">
	    <option value="0">--Plateforme--</option>
	    <option value="PS4">PS4</option>
	    <option value="Xbox One">Xbox One</option>
  	</select><br/>

	<select id="genre" name="genre">
	    <option value="0">--Genre--</option>
	    <option value="Action / Aventure">Action / Aventure</option>
	    <option value="Course">Course</option>
	    <option value="FPS">FPS</option>
	    <option value="Sport">Sport</option>
	    <option value="Gestion">Gestion</option>
	    <option value="Activités récréatives">Activités récréatives</option>
  	</select><br/>

	<input class="field" type="text" name="note" placeholder="Note" /><br/>

	<input class="field" type="text" name="prix" placeholder="Prix" /><br/>

	<input class="field" type="text" name="image" placeholder="Lien vers l'image" /><br/>

	<input class="field" type="submit" value="Ajouter"/>

</form>
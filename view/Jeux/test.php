<?php
	require_once('../../lib/File.php');

	$pseudo = "mister_you";
	$nonce = "drtfvgyb4856cdrftv4785cdftgv";

	$mail = '<p>Bonjour, et merci de vous être inscrit sur notre site. 
							Voici un lien qui vous permet de vous connecter.</p>
							<a href="' . 'localhost/html/projetPHP/' . '?action=validate&pseudo=' . $pseudo . '&nonce=' . $nonce . 
							'">http://blablabla</a>
							<p>A bientôt sur notre site MacronMania ! Parce que c\'est notre projet !</p>';

	echo $mail;

?>
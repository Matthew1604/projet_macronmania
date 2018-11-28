<?php

	require_once(File::build_path(array('model', 'Model.php')));

	class ModelJeux {
		private $idJeu;
		private $nomJeu;
		private $plateforme;
		private $genre;
		private $image;
		private $noteSur5;
		private $prix;

		/************************************************************************************/
		/************************************************************************************/
		/************************************************************************************/

		public function __construct($id = NULL, $nom = NULL, $plateforme = NULL, 
									$genre = NULL, $img = NULL, $note = NULL, $prix = NULL) {
			if (!is_null($id) && !is_null($nom) && !is_null($plateforme) && 
				!is_null($genre) && !is_null($img) && !is_null($note) && !is_null($prix)) {
				$this->idJeu = $id;
				$this->nomJeu = $nom;
				$this->plateforme = $plateforme;
				$this->genre = $genre;
				$this->image = $img;
				$this->noteSur5 = $note;
				$this->prix = $prix;
			}
		}

		public function getNomJeu() {
			return $this->nomJeu;
		}

		public function getPlateforme() {
			return $this->plateforme;
		}


		/************************************************************************************/
		/************************************************************************************/

		public static function getAllNomJeux() {
			$res = Model::$pdo->prepare("SELECT nomJeu, plateforme FROM Jeux");
			$res->execute();
			if (empty($res))
				return false;
			return $res;
		}

		/************************************************************************************/	

		public static function search() {

			 $_GET["termes"] = htmlspecialchars($_GET["termes"]); //pour sécuriser le formulaire contre les failles html
			 $recherche = $_GET["termes"];
			 $recherche = trim($recherche); //pour supprimer les espaces dans la requête de l'internaute
			 $recherche = strip_tags($recherche); //pour supprimer les balises html dans la requête

			if (isset($recherche)) {
				 $recherche = strtolower($recherche); // mets les caractère en minuscule
				 $res = Model::$pdo -> prepare("SELECT nomJeu, plateforme FROM Jeux WHERE nomJeu LIKE ?"); //sélectionne les jeux qui contiennent des mots qui ressemblent à la requête du client.
				 $res->execute(array("%".$recherche."%"));
				 $res->setFetchMode(PDO::FETCH_CLASS, 'ModelJeux');
				 $res = $res->fetchAll();

				 if (empty($res))
				 	return false;
				 return $res;
			}
		}
	}


?>
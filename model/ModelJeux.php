<?php

	require_once(File::build_path(array('model', 'Model.php')));

	class ModelJeux extends Model {
		private $idJeu;
		private $nomJeu;
		private $plateforme;
		private $genre;
		private $image;
		private $noteSur5;
		private $prix;
		protected static $object = 'Jeux';
		protected static $primary = 'idJeu';

		/************************************************************************************/
		/************************************************************************************/
		/************************************************************************************/

		public function __construct($nom = NULL, $plateforme = NULL, 
									$genre = NULL, $img = NULL, $note = NULL, $prix = NULL) {
			if (!is_null($nom) && !is_null($plateforme) && !is_null($genre) 
				&& !is_null($img) && !is_null($note) && !is_null($prix)) {
					$this->nomJeu = $nom;
					$this->plateforme = $plateforme;
					$this->genre = $genre;
					$this->image = $img;
					$this->noteSur5 = $note;
					$this->prix = $prix;
			}
		}

		public function getId() {
			return $this->idJeu;
		}

		public function getNomJeu() {
			return $this->nomJeu;
		}

		public function getPlateforme() {
			return $this->plateforme;
		}

		public function getGenre() {
			return $this->genre;
		}

		public function getImage() {
			return $this->image;
		}

		public function getNote() {
			return $this->noteSur5;
		}

		public function getPrix() {
			return $this->prix;
		}


		/************************************************************************************/	
		/************************************************************************************/	

		public static function search() {
			if (isset($_GET['plateforme']) && $_GET['plateforme'] != '0') $plateforme = $_GET['plateforme'];
			if (isset($_GET['genre']) && $_GET['genre'] != '0') $genre = $_GET['genre'];
			$termes = htmlspecialchars($_GET["termes"]); //pour sécuriser le formulaire contre les failles html
			$termes = trim($termes); //pour supprimer les espaces dans la requête de l'internaute
			$termes = strip_tags($termes); //pour supprimer les balises html dans la requête

			if (isset($termes)) {
				$termes = strtolower($termes); // mets les caractère en minuscule
				$sql = "SELECT idJeu, nomJeu, plateforme, image FROM Jeux WHERE nomJeu LIKE :termes ";
				if (isset($_GET['plateforme']) && $_GET['plateforme'] != '0') $sql .= "AND plateforme = :plateforme ";
				if (isset($_GET['genre']) && $_GET['genre'] != '0') $sql .= "AND genre = :genre ";
				$res = Model::$pdo -> prepare($sql);

				$values = array('termes' => '%'.$termes.'%');
				if (isset($_GET['plateforme']) && $_GET['plateforme'] != '0') $values['plateforme'] = $plateforme;
				if (isset($_GET['genre']) && $_GET['genre'] != '0') $values['genre'] = $genre;

				$res->execute($values);
				$res->setFetchMode(PDO::FETCH_CLASS, 'ModelJeux');
				$jeux = $res->fetchAll();

				if (empty($res))
					return false;
				return $jeux;
			}
		}

		/************************************************************************************/

	}


?>
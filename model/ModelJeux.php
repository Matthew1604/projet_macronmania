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

			 $_GET["termes"] = htmlspecialchars($_GET["termes"]); //pour sécuriser le formulaire contre les failles html
			 $recherche = $_GET["termes"];
			 $recherche = trim($recherche); //pour supprimer les espaces dans la requête de l'internaute
			 $recherche = strip_tags($recherche); //pour supprimer les balises html dans la requête

			if (isset($recherche)) {
				 $recherche = strtolower($recherche); // mets les caractère en minuscule
				 $res = Model::$pdo -> prepare("SELECT nomJeu, plateforme, image FROM Jeux WHERE nomJeu LIKE ?"); //sélectionne les jeux qui contiennent des mots qui ressemblent à la requête du client.
				 $res->execute(array("%".$recherche."%"));
				 $res->setFetchMode(PDO::FETCH_CLASS, 'ModelJeux');
				 $res = $res->fetchAll();

				 if (empty($res))
				 	return false;
				 return $res;
			}
		}

		/************************************************************************************/

		public function save() {
			try {
				$sql = 'INSERT INTO Jeux (idJeu, nomJeu, plateforme, genre, image, noteSur5, prix) VALUES (NULL, :nom, :plateforme, :genre, :image, :note, :prix)';
				$res = Model::$pdo->prepare($sql);
				$values = array('nom' => $this->getNomJeu(), 
								'plateforme' => $this->getPlateforme(),
								'genre' => $this->getGenre(),
								'image' => $this->getImage(),
								'note' => $this->getNote(),
								'prix' => $this->getPrix());
				$res->execute($values);
				return true;
			}
			catch (PDOException $e) {
				return false;
			}
		}

		/************************************************************************************/

		public static function update($data) {
			try {
				$sql = "UPDATE Jeux SET nomJeu = :nom, plateforme = :plateforme, genre = :genre,
										image = :image, noteSur5 = :note, prix = :prix
									WHERE idJeu = :id";
				$res = Model::$pdo->prepare($sql);
				$values = array('id' => $data['id'],
								'nom' => $data['nom'],
								'plateforme' => $data['plateforme'],
								'genre' => $data['genre'],
								'image' => $data['image'],
								'note' => $data['note'],
								'prix' => $data['prix']);
				$res->execute($values);
				return true;
			} catch (PDOException $e) {
				return false;
			}
		}

		/************************************************************************************/

		public static function deleteById($id) {
			try {
				$sql = "DELETE FROM Jeux WHERE idJeu = :id";
				$res = Model::$pdo->prepare($sql);
				$values = array('id' => $id);
				$res->execute($values);
				return true;
			} catch(PDOException $e) {
				return false;
			}
		}
	}


?>
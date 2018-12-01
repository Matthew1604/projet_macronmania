<?php

	require_once(File::build_path(array('model', 'Model.php')));

	class ModelClient {
		private $idClient;
		private $pseudoClient;
		private $nomClient;
		private $prenomClient;
		private $mailClient;
		private $mdpClient;

		/************************************************************************************/
		/************************************************************************************/
		/************************************************************************************/

		public function __construct($pseudo = NULL, $nom = NULL,
									$prenom = NULL, $mail = NULL, $mdp = NULL) {
			if (!is_null($pseudo) && !is_null($nom) && !is_null($prenom) && !is_null($mail) && !is_null($mdp)) {
					$this->pseudoClient = $pseudo;
					$this->nomClient = $nom;
					$this->prenomClient = $prenom;
					$this->mailClient = $mail;
					$this->mdpClient = $mdp;
			}
		}

		public function getId() {
			return $this->idClient;
		}

		public function getPseudo() {
			return $this->pseudoClient;
		}

		public function getNom() {
			return $this->nomClient;
		}

		public function getPrenom() {
			return $this->prenomClient;
		}

		public function getMail() {
			return $this->mailClient;
		}

		public function getMdp() {
			return $this->mdpClient;
		}

		/************************************************************************************/
		/************************************************************************************/

		public static function connect($pseudo) {
			$sql = "SELECT * FROM Clients WHERE pseudoClient = :pseudo";
		    $rep = Model::$pdo -> prepare($sql);

		    $values = array('pseudo' => $pseudo);

		    $rep -> execute($values);
		    $rep -> setFetchMode(PDO::FETCH_CLASS, 'ModelClient');
		    $user = $rep -> fetchAll();

		    if (empty($user))
		    	return false;
		    return $user;
		}

  		/************************************************************************************/

		public function create() {
			$sql = "INSERT INTO Clients(idClient, pseudoClient, nomClient, prenomClient, mailClient, mdpClient)
					VALUES(NULL, :pseudo, :nom, :prenom, :email, :mdp)";
		  	$req_prep = Model::$pdo->prepare($sql);

		    $pass_hach = hash('sha256', $this->mdpClient);

		  	$values = array(
				"pseudo" => $this->pseudoClient,
				"nom" => $this->nomClient,
				"prenom" => $this->prenomClient,
				"email" => $this->mailClient,
				"mdp" => $pass_hach
		  	);

		  	$req_prep -> execute($values);
		}

	}

?>
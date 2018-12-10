<?php

	require_once(File::build_path(array('model', 'Model.php')));
	require_once (File::build_path(array('lib', 'Security.php')));

	class ModelClients extends Model {
		private $pseudoClient;
		private $nomClient;
		private $prenomClient;
		private $mailClient;
		private $mdpClient;
		private $nonce;
		protected static $object = 'Clients';
		protected static $primary = 'pseudoClient';

		/************************************************************************************/
		/************************************************************************************/
		/************************************************************************************/

		public function __construct($pseudo = NULL, $nom = NULL, $prenom = NULL,
									$mail = NULL, $mdp = NULL, $nonce = NULL) {
			if (!is_null($pseudo) && !is_null($nom) && !is_null($prenom) && !is_null($mail) && !is_null($mdp)) {
					$this->pseudoClient = $pseudo;
					$this->nomClient = $nom;
					$this->prenomClient = $prenom;
					$this->mailClient = $mail;
					$this->mdpClient = $mdp;
					$this->nonce = $nonce;
			}
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

		public function getNonce() {
			return $this->nonce;
		}

		/************************************************************************************/
		/************************************************************************************/

		public static function connect($pseudo) {
			$sql = "SELECT * FROM Clients WHERE pseudoClient = :pseudo";
		    $rep = Model::$pdo -> prepare($sql);

		    $values = array('pseudo' => $pseudo);

		    $rep -> execute($values);
		    $rep -> setFetchMode(PDO::FETCH_CLASS, 'ModelClients');
		    $user = $rep -> fetchAll();

		    if (empty($user))
		    	return false;
		    return $user;
		}

		/************************************************************************************/

		

	}

?>
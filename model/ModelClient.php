<?php

	require_once(File::build_path(array('model', 'Model.php')));

	class ModelClients {
		private $idClient;
		private $pseudoClient;
		private $nomClient;
		private $prenomClient;
		private $mailClient;
		private $mdpClient;

		/************************************************************************************/
		/************************************************************************************/
		/************************************************************************************/

		public function __construct($id = NULL, $pseudo = NULL, $nom = NULL,
									$prenom = NULL, $mail = NULL, $mdp = NULL) {
			if (!is_null($id) && !is_null($pseudo) && !is_null($nom) && 
				!is_null($prenom) && !is_null($mail) && !is_null($mdp)) {
					$this->idClient = $id;
					$this->pseudoClient = $pseudo;
					$this->nomClient = $nom;
					$this->prenomClient = $prenom;
					$this->mailClient = $mail;
					$this->mdpClient = $mdp;
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

		/************************************************************************************/
		/************************************************************************************/

		public static function nomFonction() {
			
		}

	}

?>
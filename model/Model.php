<?php

require_once(File::build_path(array('config', 'Conf.php')));

	class Model {

		public static $pdo;

		public static function Init() {

			$login = Conf::getLogin();
			$password = Conf::getPassword();
			$hostname = Conf::getHostname();
			$database = Conf::getDatabase();

			try{
			  	// Connexion à la base de données            
				// Le dernier argument sert à ce que toutes les chaines de caractères 
				// en entrée et sortie de MySql soit dans le codage UTF-8
				self::$pdo = new PDO("mysql:host=$hostname;dbname=$database", $login, $password,
				                     array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
				   
				// On active le mode d'affichage des erreurs, et le lancement d'exception en cas d'erreur
				self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			} catch (PDOException $e) {
				  if (Conf::getDebug()) {
				    echo $e->getMessage(); // affiche un message d'erreur
				  } else {
				    echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
				  }
				  die();
			}

		}

		/************************************************************************************/
		/************************************************************************************/

		public static function selectAll() {
			$tableName = static::$object;
			$className = 'Model'.ucfirst($tableName);

			$res = Model::$pdo->prepare("SELECT * FROM $tableName");
			$res->execute();
			$res->setFetchMode(PDO::FETCH_CLASS, $className);
			$res = $res->fetchAll();
			if (empty($res))
				return false;
			return $res;
		}

		/************************************************************************************/

		public static function select($primaryValue) {
			$tableName = static::$object;
			$className = 'Model'.ucfirst($tableName);
			$primaryKey = static::$primary;

			$sql = "SELECT * FROM $tableName WHERE $primaryKey = :primaryValue";
			$res = Model::$pdo->prepare($sql);
			$values = array('primaryValue' => $primaryValue);
			$res->execute($values);
			$res->setFetchMode(PDO::FETCH_CLASS, $className);
			$res = $res->fetchAll();
			if(empty($res))
				return false;
			return $res[0];
		}

		/************************************************************************************/

		public static function delete($primaryValue) {
			$tableName = static::$object;
			$primaryKey = static::$primary;

			try {
				$sql = "DELETE FROM $tableName WHERE $primaryKey = :id";
				$res = Model::$pdo->prepare($sql);
				$values = array('id' => $primaryValue);
				$res->execute($values);
				return true;
			} catch(PDOException $e) {
				return false;
			}
		}

		/************************************************************************************/

		public static function update($data) {
			$tableName = static::$object;
			$primaryKey = static::$primary;

			try {
				
				$sql = "UPDATE $tableName SET ";
				foreach ($data as $key => $value) {
					if ($key != $primaryKey)
						$sql .= "$key = :$key, ";
				}
				$sql = rtrim($sql, ', ');
				$sql .= " WHERE $primaryKey = :$primaryKey";

				$res = Model::$pdo->prepare($sql);
				$res->execute($data);
				return true;

			} catch (PDOException $e) {
				return false;
			}
		}

		/************************************************************************************/

		public static function save($data) {
			try {
				$tableName = static::$object;
				$primaryKey = static::$primary;

				$sql = "INSERT INTO $tableName VALUES (";
				foreach ($data as $key => $value) {
					$sql .= ":$key, ";
				}
				$sql = rtrim($sql, ', ');
				$sql .= ")";

				$res = Model::$pdo->prepare($sql);
				$res->execute($data);
				return true;
			} catch (PDOException $e) {
				return $e->getCode();

			}
		}
	}

	Model::Init();

?>
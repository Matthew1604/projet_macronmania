<?php
$tableName = 'Jeux';
$primaryKey = 'idJeu';
$data = array('nomJeux' => 'Red Dead',
				   'plateforme' => 'PS4');

$sql = "INSERT INTO $tableName VALUES (NULL, ";
foreach ($data as $key => $value) {
		$sql .= ":$key, ";
}
$sql = rtrim($sql, ', ');
$sql .= ")";

echo $sql;

?>
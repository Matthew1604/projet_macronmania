<?php
$tableName = 'Jeux';
$primaryKey = 'idJeu';
$tabObject = array('ModelJeuxidJeux' => '1',
				   'ModelJeuxnomJeu' => 'Red');

$sql = "INSERT INTO $tableName VALUES ($primaryKey = NULL, ";
foreach ($tabObject as $key => $value) {
	if ($key != $primaryKey)
		$sql .= "$key = :$key, ";
}

echo $sql;

?>
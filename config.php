<?php
/**
 * On défini notre fichier de connexion 
 */

$databaseHost = 'localhost';
$databaseName = 'sprint6';
$databaseUsername = 'root';
$databasePassword = '';

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

?>
<!-- <?php
/**
 * On défini notre fichier de connexion 
 */

// $databaseHost = 'localhost';
// $databaseName = 'sprint6';
// $databaseUsername = 'root';
// $databasePassword = '';

// $mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

?> -->


<?php
/* Database connexion */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'sprint6');
 
/* Connexion à la base de données */
$mysqli = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// verifier connection
if($mysqli === false){
die("ERROR: Impossible de se connecter. " . mysqli_connect_error());
 }
?>


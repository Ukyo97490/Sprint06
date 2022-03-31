
<?php
$mysqli = mysqli_connect("109.234.164.161", $_SERVER['DB_USER'], $_SERVER['DB_PASSWORD'],"sc1lgvu9627_damour-gregory.sprint-06");
 
// verifier connection
if($mysqli === false){
die("ERROR: Impossible de se connecter. " . mysqli_connect_error());
 }
?>


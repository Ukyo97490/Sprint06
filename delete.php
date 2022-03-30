<?php
// On se connecte a la BDD
include_once("config.php");

// On récupère l'ID via l'URL
$id = $_GET['id'];

// On supprime le produit en fonction de l'ID
$result = mysqli_query($mysqli, "DELETE FROM stock WHERE id=$id");

// Après la suppression on retourne sur index
header("Location:index.php");
?>
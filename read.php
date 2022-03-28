<?php
session_start();

// On inclut la connexion à la base
require_once('connect.php');

if(isset($_GET['id']) && !empty($_GET['id'])){
    $id = strip_tags($_GET['id']);
    // On écrit notre requête
    $sql = 'SELECT * FROM `stock` WHERE `id`=:id';

    // On prépare la requête
    $query = $db->prepare($sql);

    // On attache les valeurs
    $query->bindValue(':id', $id, PDO::PARAM_INT);

    // On exécute la requête
    $query->execute();

    // On stocke le résultat dans un tableau associatif
    $produit = $query->fetch();

    if(!$produit){
        header('Location: index.php');
    }
}else{
    header('Location: index.php');
}

require_once('close.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VAP Factory:Fiche produit</title>

</head>
<body>
    <h1>Détails du produit <?= $produit['nom'] ?></h1>
    <p>REF : <?= $produit['ref'] ?></p>
    <p>Produit : <?= $produit['resume'] ?></p>
    <p>Prix d'achat: : <?= $produit['prix_achat']."€" ?></p>
    <p>Prix : <?= $produit['prix_vente']."€" ?></p>
    <p>Nombre : <?= $produit['quantite'] ?></p>
    <p><a href="update.php?id=<?= $produit['id'] ?>">Modifier</a>  <a href="delete.php?id=<?= $produit['id'] ?>">Supprimer</a></p>
</body>
</html>
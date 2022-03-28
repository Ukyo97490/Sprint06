<?php

// On inclut la connexion à la base
require_once('connect.php');

// On écrit notre requête
$sql = 'SELECT * FROM `stock`';

// On prépare la requête
$query = $db->prepare($sql);

// On exécute la requête
$query->execute();

// On stocke le résultat dans un tableau associatif
$result = $query->fetchAll(PDO::FETCH_ASSOC);

require_once('close.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VAP Factory</title>
</head>
<body>
    <h1>Liste des produits</h1>
    <table>
        <thead>
            <th>Référence</th>
            <th>Nom</th>
            <th>Description</th>
            <th>Prix d'achat</th>
            <th>Prix de vente</th>
            <th>Stock</th>
        </thead>
        <tbody>
        <?php
            foreach($result as $produit){
        ?>
                <tr>
                    <td><?= $produit['ref'] ?></td>
                    <td><?= $produit['nom'] ?></td>
                    <td><?= $produit['resume'] ?></td>
                    <td><?= $produit['prix_achat'] ?></td>
                    <td><?= $produit['prix_vente'] ?></td>
                    <td><?= $produit['quantite'] ?></td>
                    <td><a href="read.php?id=<?= $produit['id'] ?>">Voir</a>  <a href="update.php?id=<?= $produit['id'] ?>">Modifier</a>  <a href="delete.php?id=<?= $produit['id'] ?>">Supprimer</a></td>
                </tr>
        <?php
            }
        ?>
        </tbody>
    </table>
    <a href="create.php">Ajouter</a>
</body>
</html>
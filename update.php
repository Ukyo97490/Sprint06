<?php
require_once('connect.php');

if(isset($_POST)){
    if(isset($_POST['id']) && !empty($_POST['id'])
        && isset($_POST['ref']) && !empty($_POST['ref'])
        && isset($_POST['nom']) && !empty($_POST['nom'])
        && isset($_POST['resume']) && !empty($_POST['resume'])
        && isset($_POST['prix_achat']) && !empty($_POST['prix_achat'])
        && isset($_POST['prix_vente']) && !empty($_POST['prix_vente'])
        && isset($_POST['quantite']) && !empty($_POST['quantite']))
        {
        $id = strip_tags($_GET['id']);
        $ref = strip_tags($_GET['ref']);
        $nom = strip_tags($_POST['nom']);
        $resume = strip_tags($_POST['resume']);
        $prix_achat = strip_tags($_POST['prix_achat']);
        $prix_vente = strip_tags($_POST['prix_vente']);
        $quantite = strip_tags($_POST['quantite']);

        // $sql = "UPDATE `stock` SET `produit`=:produit, `prix`=:prix, `nombre`=:nombre WHERE `id`=:id;";
        $sql = "UPDATE `stock` SET `ref`=:ref,`nom`=:nom,`resume`=:resume,`prix_achat`=:prix_achat,`prix_vente`=:prix_vente,`quantite`=:quantite, WHERE `id`=:id;";
        $query = $db->prepare($sql);

        $query->bindValue(':ref', $ref, PDO::PARAM_STR);
        $query->bindValue(':nom', $nom, PDO::PARAM_STR);
        $query->bindValue(':resume', $resume, PDO::PARAM_STR);
        $query->bindValue(':prix_achat', $prix_achat, PDO::PARAM_STR);
        $query->bindValue(':prix_vente', $prix_vente, PDO::PARAM_STR);
        $query->bindValue(':quantite', $quantite, PDO::PARAM_INT);

        $query->execute();

        header('Location: index.php');
    }
}

if(isset($_GET['id']) && !empty($_GET['id'])){
    $id = strip_tags($_GET['id']);
    $sql = "SELECT * FROM `stock` WHERE `id`=:id;";

    $query = $db->prepare($sql);

    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->execute();

    $result = $query->fetch();
}

require_once('close.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VAP Factory:Modifier un produit</title>
</head>
<body>
    <h1>Modifier un produit</h1>
    <form method="post">
        <p>
            <label for="ref">Référence:</label>
            <input type="text" name="ref" id="ref" value="<?= $result['ref'] ?>">
        </p>
        <p>
            <label for="nom">Nom:</label>
            <input type="text" name="nom" id="nom" value="<?= $result['nom'] ?>">
        </p>
        <p>
            <label for="resume">Description:</label>
            <input type="text" name="resume" id="resume" value="<?= $result['resume'] ?>">
        </p>
        <p>
            <label for="prix_achat">Prix d'achat:</label>
            <input type="text" name="prix_achat" id="prix_achat" value="<?= $result['prix_achat'] ?>">
        </p>
        <p>
            <label for="prix_vente">Prix de revente:</label>
            <input type="text" name="prix_vente" id="prix_vente" value="<?= $result['prix_vente'] ?>">
        </p>
        <p>
            <label for="quantite">Quantité:</label>
            <input type="number" name="quantite" id="quantite" value="<?= $result['quantite'] ?>">
        </p>
        <p>
            <button>Enregistrer</button>
        </p>
        <input type="hidden" name="id" value="<?= $result['id'] ?>">
    </form>
</body>
</html>
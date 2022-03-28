<?php
// On inclut la connexion à la base
require_once('connect.php');

if(isset($_POST)){
    if(isset($_POST['ref']) && !empty($_POST['ref'])
        && isset($_POST['nom']) && !empty($_POST['nom'])
        && isset($_POST['resume']) && !empty($_POST['resume'])
        && isset($_POST['prix_achat']) && !empty($_POST['prix_achat'])
        && isset($_POST['prix_vente']) && !empty($_POST['prix_vente'])
        && isset($_POST['quantite']) && !empty($_POST['quantite'])){
            $produit = strip_tags($_POST['ref']);
            $prix = strip_tags($_POST['nom']);
            $prix = strip_tags($_POST['resume']);
            $prix = strip_tags($_POST['prix_achat']);
            $prix = strip_tags($_POST['prix_vente']);
            $nombre = strip_tags($_POST['quantite']);

            $sql = "INSERT INTO `stock` (`ref`,`nom`,`resume`,`prix_achat`,`prix_vente`, `quantite`) VALUES (:ref,:nom,:resume, :prix_achat,:prix_vente, :quantite);";

            $query = $db->prepare($sql);

            $query->bindValue(':ref', $ref, PDO::PARAM_STR);
            $query->bindValue(':nom', $nom, PDO::PARAM_STR);
            $query->bindValue(':resume', $resume, PDO::PARAM_STR);
            $query->bindValue(':prix_achat', $prix_achat, PDO::PARAM_STR);
            $query->bindValue(':prix_vente', $prix_vente, PDO::PARAM_STR);
            $query->bindValue(':quantite', $quantite, PDO::PARAM_INT);

            $query->execute();
            $_SESSION['message'] = "Produit ajouté avec succès !";
            header('Location: index.php');
        }
}

require_once('close.php');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VAP Factory:Ajouter un produit</title>
</head>
<body>
<form method="post">
<label for="ref">Référence:</label>
    <input type="text" name="ref" id="ref">
<br/>
    <label for="nom">Nom:</label>
    <input type="text" name="nom" id="nom">
    <br/>
    <label for="resume">Description:</label>
    <input type="text" name="resume" id="resume">
    <br/>
    <label for="prix_achat">Prix_achat:</label>
    <input type="text" name="prix_achat" id="prix_achat">
    <br/>
    <label for="prix_vente">Prix_vente:</label>
    <input type="text" name="prix_vente" id="prix_vente">
    <br/>
    <label for="quantite">Quantité:</label>
    <input type="number" name="quantite" id="quantite">
    <br/>
    <button>Enregistrer</button>
</form>
</body>
</html>
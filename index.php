<?php
// // On inclus le fichier de config pour la connexion a la BDD
include_once("config.php");

// On récupère toutes les données de la table "stock"
$result = mysqli_query($mysqli, "SELECT * FROM stock ORDER BY id DESC");
?>

<html>
<head>
<link rel="icon" href="vape.png">
    <!-- Le link de fichier css ne fonctionnant pas on trouve une méthode alternative via un fichier php où l'on écrit le script css -->
<?php include("style.php") ?>
    <title>VAP Factory: Le Stock</title>
</head>

<body>
 
<div class="header"></div>
        <div class="nav">
            
            <div class="bouton-nav-head">
                <a href="index.php">Accueil</a>
                </div>
    
                <div class="bouton-nav-head" >
                    <a href="create.php" >Ajouter un produit</a>
                    </div>
    
        </div>
    </div>


    <table>

    <thead>
        <th>Référence</th> <th>Nom</th> <th>Description</th> <th>Prix d'achat</th><th>Prix de revente</th><th>Quantité</th>
    </thead>
    <?php

    while($stock_data = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>".$stock_data['ref']."</td>";
        echo "<td>".$stock_data['nom']."</td>";
        echo "<td>".substr($stock_data['about'], 0,40). "..."."</td>";
        echo "<td>".$stock_data['prix_achat']."€"."</td>";
        echo "<td>".$stock_data['prix_revente']." €"."</td>";
        echo "<td>".$stock_data['quantite']."</td>";
        echo "<td><a href='update.php?id=$stock_data[id]'>✏</a> | <a href='read.php?id=$stock_data[id]'>🔍</a> | <a href='delete.php?id=$stock_data[id]'>❌</a></td></tr>";
    }
    ?>
    </table>
</body>
</html>
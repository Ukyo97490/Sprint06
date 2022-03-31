<?php
// Verifiez si le parametre id existe
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    // Inclure le fichier config
    require_once "config.php";
    
    // Preparer la requete
    $sql = "SELECT * FROM stock WHERE id = ?";
    
    if($stmt = mysqli_prepare($mysqli, $sql)){
        // Bind les variables
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        
        // Set parameters
        $param_id = trim($_GET["id"]);
        
        // Attempt to execute la requete
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
    
            if(mysqli_num_rows($result) == 1){
                /* recuperer l'enregistrement */
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                
                // recuperer les champs
                $nom = $row["nom"];
                $about = $row["about"];
                $ref = $row["ref"];
                $prix_achat = $row["prix_achat"];
                $prix_revente = $row["prix_revente"];
                $quantite = $row["quantite"];
            } else{
                // Si pas de id correct retourne la page d'erreur
                header("location: index.php");
                exit();
            }
            
        } else{
            echo "Oops! une erreur est survenue.";
        }
    }
     
    // On ferme
    mysqli_stmt_close($stmt);
    
    // Close connection
    mysqli_close($mysqli);
} else{
    // Si pas de id correct retourne la page d'erreur
    header("location: error.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<link rel="icon" href="vape.png">
<?php include("style.php") ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css"/>
    <title>VAP Factory:Fiche produit</title>

</head>
<body>
 <div class="container">
<h1>Fiche produit</h1>
    
<div class="card">
    <H2 class="productitle"><?php echo $nom;?></H2>
    <strong>REF:</strong> <?php echo $ref;?></p>
    <strong>Prix d'achat:</strong> <?php echo number_format($prix_achat,2)."€" ;?><br/>
    <strong>Prix revente :</strong> <?php echo number_format($prix_revente,2)."€" ;?><br/>
    <strong>Quantité en stock :</strong><?php echo $quantite;?>
    <h4>Description :</h4><div class="description"><?php echo $about;?></div>
    <br/></div>
        <div class="footer-card"><a href="index.php"><strong>Revenir a la page de stock</strong></a></div>
</div>   
</body>
</html>
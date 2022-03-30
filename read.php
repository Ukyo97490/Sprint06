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
     
    // Close statement
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
<?php include("style.php") ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css"/>
    <title>VAP Factory:Fiche produit</title>

</head>
<body>
    <div class="card">
    <h1>Détails du produit</h1>
    <H2 class="lol"><?php echo $nom;?></H2>
    <p>REF : <?php echo $ref;?></p>
    <p>Produit :<?php echo $about;?></p>
    <p>Prix d'achat: : <?php echo $prix_achat."€" ;?></p>
    <p>Prix : <?php echo $prix_revente."€" ;?></p>
    <p>Nombre :<?php echo $quantite;?></p>
    <br/>
    <p><a href="index.php">Revenir a la page de stock</a>
</div>
    <!-- <p><a href="index.php">Revenir a la page de stock</a> -->
</body>
</html>
<html>
<head>
<link rel="icon" href="vape.png">
<?php include("style.php") ?>
	<title>VAP Factory:Ajouter un produit</title>
</head>

<body>
	<a href="index.php">Retourner au stock !</a>
	<br/><br/>

	<form action="create.php" method="post" name="form1">
	<form>
	<label for="ref">Référence:</label><br />
	 <input name="ref" type="text"  /> <br /> 
	 <label for="nom">Nom du produit:</label><br />
	 <input name="nom" type="text" /> <br /> 
	 <label for="about">Description:</label><br /> 
	<textarea name="about" cols="50" rows="5"></textarea><br /> 
	<input  type="textarea">
   <nom>demande</nom>
   <libellé>formulez votre demande</libellé>
</input>
	<label for="prix_achat">Prix d'achat:</label><br /> 
	<input type="number"  step="0.01"  name="prix_achat" /> <br /> 
	<label for="prix_revente">Prix de revente:</label><br /> 
	<input type="number"  step="0.01" name="prix_revente"/> <br /> 		
	<label for="quantite">Quantité:</label><br />
				<input type="number" name="quantite"><br /> 
				<input type="submit" name="Submit" value="Ajouter">
			</tr>
		</table>
	</form>

	<?php

	// Si le formulaire est soumis alors on insère les données dans la table stock.
	if(isset($_POST['Submit'])) {
		$ref =htmlspecialchars(strip_tags( $_POST['ref']));
		$nom =htmlspecialchars( strip_tags($_POST['nom']));
		$about = htmlspecialchars( strip_tags($_POST['about']));
		$prix_achat = htmlspecialchars( strip_tags($_POST['prix_achat']));
		$prix_revente = htmlspecialchars( strip_tags($_POST['prix_revente']));
		$quantite = htmlspecialchars( strip_tags($_POST['quantite']));

		// On inclus le fichier de config pour la connexion a la BDD
		include_once("config.php");

		// On insère notre article dans le stock
		$result = mysqli_query($mysqli, "INSERT INTO stock(ref,nom,about,prix_achat,prix_revente,quantite) VALUES('$ref','$nom','$about','$prix_achat','$prix_revente','$quantite')");

		// On retourne un message de validation
		echo "L'article a été créé. <a href='index.php'>Voir le Stock</a>";
	}
	?>
</body>
</html>
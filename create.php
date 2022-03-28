<html>
<head>
	<title>Add Users</title>
</head>

<body>
	<a href="index.php">Retourner au stock !</a>
	<br/><br/>

	<form action="create.php" method="post" name="form1">
		<table width="25%" border="0">
			<tr>
				<td>Référence:</td>
				<td><input type="text" name="ref"></td>
			</tr>
			<tr>
				<td>Nom du produit:</td>
				<td><input type="text" name="nom"></td>
			</tr>
			<tr>
				<td>Description:</td>
				<td><input type="text" name="about"></td>
			</tr>
			<tr>
				<td>Prix d'achat:</td>
				<td><input type="text" name="prix_achat"></td>
			</tr>
			<tr>
				<td>Prix de revente:</td>
				<td><input type="text" name="prix_revente"></td>
			</tr>
			<tr>
				<td>Quantité:</td>
				<td><input type="number" name="quantite"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="Submit" value="Ajouter"></td>
			</tr>
		</table>
	</form>

	<?php

	// Si le formulaire est soumis alors on insère les données dans la table stock.
	if(isset($_POST['Submit'])) {
		$ref = $_POST['ref'];
		$nom = $_POST['nom'];
		$about = $_POST['about'];
		$prix_achat = $_POST['prix_achat'];
		$prix_revente = $_POST['prix_revente'];
		$quantite = $_POST['quantite'];

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
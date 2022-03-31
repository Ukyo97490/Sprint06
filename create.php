<html>
<head>
<link rel="icon" href="vape.png">
<?php include("style.php") ?>
	<title>VAP Factory:Ajouter un produit</title>
</head>

<body>
	<div class="container">
<h1>Ajouter un produit</h1>
<div id="home"><a class="home" href="index.php">🏡 Retourner au stock !</a></div>
	

	<form class="create" action="create.php" method="post" name="form1">
		<table>
			<tr>
				<td><strong>Référence:</strong></td>
				<td><input class="formlenght" type="text" name="ref"></td>
			</tr>
			<tr>
				<td><strong>Nom du produit:</strong></td>
				<td><input class="formlenght" type="text" name="nom"></td>
			</tr>
			<tr>
				<td><strong>Description:</strong></td>
				<td><textarea class="formtextarea" id="about" name="about"
          rows="5" cols="33"></textarea></td>
			</tr>
			<tr>
				<td><strong>Prix d'achat:</strong></td>
				<td><input class="formlenght" type="number"  step="0.01"  name="prix_achat"></td>
			</tr>
			<tr>
				<td><strong>Prix de revente:</strong></td>
				<td><input class="formlenght" type="number"  step="0.01" name="prix_revente"></td>
			</tr>
			<tr>
				<td><strong>Quantité:</strong></td>
				<td><input class="formlenght" type="number" name="quantite"></td>
			</tr>
			<tr>
				<td></td>
				<td><center><input class="submit-create" type="submit" name="Submit" value="Ajouter"></center></td>
			</tr>
		</table>
	</form>
</div>
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
		echo "L'article a été créé. <a href='index.php'>🏡 Retourner au stock !</a>";
	}
	?></div>
</body>
</html>
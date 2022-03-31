<?php
// // On inclus le fichier de config pour la connexion a la BDD
include_once("config.php");

// Vérifiez si le formulaire est soumis pour la mise à jour de l'utilisateur, puis redirigez vers la page d'accueil après la mise à jour
if(isset($_POST['update']))
{
	$id = $_POST['id'];

	$ref=$_POST['ref'];
	$nom=$_POST['nom'];
	$about=$_POST['about'];
	$prix_achat=$_POST['prix_achat'];
	$prix_revente=$_POST['prix_revente'];
	$quantite=$_POST['quantite'];

	// update stock 
	$result = mysqli_query($mysqli, "UPDATE stock SET ref='$ref',nom='$nom',about='$about',prix_achat='$prix_achat',prix_revente='$prix_revente',quantite='$quantite' WHERE id=$id");

	// Rediriger vers la page d'accueil pour afficher la page du stock
	header("Location: index.php");
}
?>
<?php
// On affiche les articles en fonction de l'ID
// On récupère l'ID via l'URL 
$id = $_GET['id'];

// On récup les articles en fonction des ID
$result = mysqli_query($mysqli, "SELECT * FROM stock WHERE id=$id");

while($stock_data = mysqli_fetch_array($result))
{
	$ref = $stock_data['ref'];
	$nom = $stock_data['nom'];
	$about = $stock_data['about'];
	$prix_achat = $stock_data['prix_achat'];
	$prix_revente = $stock_data['prix_revente'];
	$quantite = $stock_data['quantite'];
}
?>
<html>
<head>
<link rel="icon" href="vape.png">
<?php include("style.php") ?>
	<title>VAP Factory:Modifier un produit</title>
</head>

<body>
<div class="container">
<h1>Modifier un produit</h1>
<div class="subtitle">Produit en cours de modification: <strong class="subtitle-name"><?php echo $nom;?></strong></div>
<div id="home"><a class="home" href="index.php">🏡 Retourner au stock !</a></div>
	
	<form name="update_stock" method="post" action="update.php">
	<table>
			<tr>
				<td><strong>Référence:</strong></td>
				<td><input class="formlenght" type="text" name="ref" value="<?php echo $ref;?>"></td>
			</tr>
			<tr>
				<td><strong>Nom du produit:</strong></td>
				<td><input class="formlenght" type="text" name="nom" value="<?php echo $nom;?>"></td>
			</tr>
			<tr>
				<td><strong>Description:</strong></td>
				<td><textarea class="formtextarea" id="about" name="about"
          rows="5" cols="33" ><?php echo $about;?></textarea></td>
			</tr>
			<tr>
				<td><strong>Prix d'achat:</strong></td>
				<td><input class="formlenght" type="number"  step="0.01"  name="prix_achat" value=<?php echo $prix_achat;?>></td>
			</tr>
			<tr>
				<td><strong>Prix de revente:</strong></td>
				<td><input class="formlenght" type="number"  step="0.01" name="prix_revente" value=<?php echo $prix_revente;?>></td>
			</tr>
			<tr>
				<td><strong>Quantité:</strong></td>
				<td><input class="formlenght" type="number" name="quantite" value=<?php echo $quantite;?>></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><center><input class="submit-create" type="submit" name="update" value="Update"></center></td>
			</tr>
		</table>
	</form>
</div>
</body>
</html>
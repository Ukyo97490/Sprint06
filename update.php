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
	<title>Edit User Data</title>
</head>

<body>
	<a href="index.php">Home</a>
	<br/><br/>

	<form name="update_stock" method="post" action="update.php">
		<table  border="0">
			<tr>
				<td>Référence:</td>
				<td><input type="text" name="ref" value="<?php echo $nom;?>"></td>
			</tr>
			<tr>
				<td>Nom:</td>
				<td><input type="text" name="nom" value="<?php echo $ref;?>"></td>
			</tr>
			<tr>
				<td>Description:</td>
				<td><input type="text" name="about" value="<?php echo $about;?>"></td>
			</tr>
			<tr>
				<td>Prix d'achat:</td>
				<td><input type="text" name="prix_achat" value=<?php echo $prix_achat;?>></td>
			</tr>
			<tr>
				<td>Prix de revente:</td>
				<td><input type="text" name="prix_revente" value=<?php echo $prix_revente;?>></td>
			</tr>
			<tr>
				<td>Quantité:</td>
				<td><input type="number" name="quantite" value=<?php echo $quantite;?>></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
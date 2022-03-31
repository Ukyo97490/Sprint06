<?php
// On va faire un fichier global pour les fonctions du site

// On commence par la connexion a la BDD

function getDatabaseConnect(){
    try {
        $bdd=new PDO('mysql:host=localhost;dbname=sprint6','root','');
        echo "Ca marche"
    }
catch (Exception $e)
{
    die('Erreur :'. $e->getMessage());
}
}



?>
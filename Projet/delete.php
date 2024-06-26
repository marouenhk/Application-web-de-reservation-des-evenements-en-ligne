<?php
session_start();
include('connexion.php'); // Connexion à la base de données

if (isset($_GET['Nom'])) 
    $Nom = $_GET['Nom'];

    // Préparer la requête de suppression
    $sql = "DELETE FROM register WHERE Nom = '$Nom'";
    $resultat = $connexion->query($sql);
    if ($resultat) {
       header("Location:info.php");
    }else{
    echo"Echec";
}
?>
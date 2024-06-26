<?php
session_start();
include('connexion.php'); // Connexion à la base de données

if (isset($_GET['id'])) 
    $Id = $_GET['id'];

    // Préparer la requête de suppression
    $sql = "DELETE FROM reservation WHERE id = '$Id'";
    $resultat = $connexion->query($sql);
    if ($resultat) {
       header("Location:reservationinfo.php");
    }else{
    echo"Echec";
}
?>
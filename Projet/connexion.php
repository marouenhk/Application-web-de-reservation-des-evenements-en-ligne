<?php
$serveur = "127.0.0.1";
$utilisateur = "root";
$motdepasse = "";
$base = "reservation_db";


//creer une connextion
$connexion = new mysqli($serveur, $utilisateur, $motdepasse, $base);


//test de connexion
if ($connexion->connect_error) {
echo("Échec de la connexion à la base de données : " . $connexion->connect_error);
header("location:404.html"); // Erreur 404
}

// else n7ytha 
?>
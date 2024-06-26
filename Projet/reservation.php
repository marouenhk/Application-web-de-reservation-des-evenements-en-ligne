<?php
include('connexion.php');

// Create
if (isset($_POST['ajouter'])) {

$name = $_POST['Nom'];
$address = $_POST['Adresse'];
$email = $_POST['E-mail'];
$phone = $_POST['Téléphone'];
$comment = $_POST['Commentaire'];
$number_of_tickets = $_POST['number'];
$payment= $_POST['payment'];

$requete = "INSERT INTO reservation(id,Nom,adresse,Email,Phone,Commentaire,numberT,payment) VALUES ('','$name', '$address', '$email', '$phone', '$comment', '$number_of_tickets', '$payment')";

if ($connexion->query($requete) === TRUE) {
  echo "Reservation affectué!";
} else {
  echo "Error: <br>" . $connexion->error;
}
}

?>
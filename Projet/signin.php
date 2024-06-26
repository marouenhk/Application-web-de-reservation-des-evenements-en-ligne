<?php
include('connexion.php');

// Create
if (isset($_POST['Register'])) {

$name = $_POST['Nom'];
$email = $_POST['E-mail'];
$password = $_POST['password'];
$password2 = $_POST['repeat'];

$req= "INSERT INTO register(Nom,Email,Pass1,Pass2) VALUES ('$name', '$email', '$password', '$password2')";

if ($connexion->query($req) === TRUE) {
  echo "Registre affectué!";
} else {
    echo "Error: <br>" . $connexion->error; }
}

?>
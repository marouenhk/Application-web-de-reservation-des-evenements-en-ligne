<?php
session_start();

include('connexion.php');

if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifie si les données ont été soumises via la méthode POST fi formulaire 

    $Nom = $_POST['Username'];
    $password = $_POST['Pass'];
    $role = $_POST['role'];// zedtha ani

    //  éviter les attaques par injection SQL (tp3)
    $Nom = $connexion->real_escape_string($Nom);
    $password = $connexion->real_escape_string($password);
    $role = $connexion->real_escape_string($role);

    // Exécute la requête SQL
    $sql = "SELECT * FROM register WHERE Nom='$Nom' AND Pass1='$password'";
    $resultat = $connexion->query($sql);

    if ($resultat->num_rows > 0) {// resultat dans db

        if(($role == 'user')){
             $_SESSION['Username']=$Nom ;// tsjl nom utilsateur fi session
             header("location:userinfo.php"); // page user
         }else{
            $_SESSION['Username'] =$Nom;
             header("location:info.php");  //page admin
         }
    } else {
        header("location:404.html");
    }
}
?>

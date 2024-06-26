<?php
session_start();
include('connexion.php');

if(isset($_GET['Nom'])) {// mawjoud
    $Nom = $_GET['Nom'];
    $sql = "SELECT * FROM register WHERE Nom='$Nom'";
    $resultat = $connexion->query($sql);

    // Vérifier si une ligne a été trouvée
    if ($resultat->num_rows > 0) {
        $row = $resultat->fetch_assoc();
    } else {
        echo "Aucun enregistrement trouvé avec ce nom.";
        exit(); 
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier</title>
    
        <!-- chatgbt en css -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .form {
            width: 60%;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .form p {
            font-size: 24px;
            color: #9a28d7;
            text-align: center;
            margin-bottom: 20px;
        }

        .form label {
            display: block;
            margin-bottom: 10px;
        }

        .form input {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form input[type="submit"] {
            background-color: #9a28d7;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        .form input[type="submit"]:hover {
            background-color: #3E0298;
        }

        .form span {
            color: #9a28d7;
            font-weight: bold;
        }
    </style>
</head>


<body>
 <form class="form" method="post" action="update.php" id="form">
    <p>Update</p>
    <div>
        <label for="Fullname">Full Name</label>
        <input class="input" type="text" id="Fullname" size="60" name="Nom" value="<?php echo isset($row['Nom']) ? $row['Nom'] : ''; ?>">
       <!-- verifier dispo ou non et le rendre ca valeur -->

    </div>  
            
    <div>
        <label for="E-mail">Email</label>
        <input class="input" type="email" id="E-mail" size="60" name="E-mail" pattern="[^@]*@[^@]*" value="<?php echo isset($row['E-mail']) ? $row['E-mail'] : ''; ?>">
    </div> 
        
    <div>
        <label for="Motdepasse">Password</label>
        <input class="input" type="password" id="Motdepasse" size="60" name="password">
    </div>

    <input type="submit" value="Update" name="updatee">
  </form>
</body>


</html>
<?php
if(isset($_POST['updatee'])){
    $nom=$_POST['Nom'];
    $email=$_POST['E-mail']; 
    $Password=$_POST['password'];

    $req="UPDATE register SET Nom='$nom',Email='$email',Pass1='$Password'
    WHERE Nom='$nom'";

    if($connexion->query($req)===TRUE){
        echo "Modification avec succès";
        header('Location:info.php');

    }else{
        echo"Echec de modification".$connexion->error;
    }
}


?>
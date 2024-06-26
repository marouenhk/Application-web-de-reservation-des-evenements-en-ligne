<?php
include('connexion.php');

if(isset($_GET['id'])) {// mawjoud
    $Id = $_GET['id'];
    $sql = "SELECT * FROM reservation WHERE id='$Id'";
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
    <title>Modifier une réservation</title>
    
        <!--  en css -->
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
 <form class="form" method="post" action="updateRSV.php" id="form">
    <p>Update</p>
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    <div>
        <label for="Nom">Nom</label>
        <input type="text" placeholder="Full name"id="Full name" size="60" name="Nom" value="<?php echo isset($row['Nom']) ? $row['Nom'] : ''; ?>"required>

    </div>  
    <div>
        <label for="adresse">adresse</label>
        <input type="text" placeholder="Adresse"id="adresse"  size="60" name="Adresse" value="<?php echo isset($row['adresse']) ? $row['adresse'] : ''; ?>"required>
    </div> 

    <div>
        <label for="E-mail">Email</label>
        <input type="email" placeholder="E-mail"id="E-mail" size="60" name="E-mail"pattern="[^ @]*@[^ @]*" value="<?php echo isset($row['Email']) ? $row['Email'] : ''; ?>"required>
    </div> 
        
    <div>
        <label for="Phone">Phone</label>
        <input type="text" placeholder="Phone"id="Phone" size="60" name="Téléphone" value="<?php echo isset($row['Phone']) ? $row['Phone'] : ''; ?>"required>
    </div> 
    <div>
        <label for="Commentaire">Commentaire</label>
        <input class="input" type="text" id="Commentaire" size="60" name="Commentaire"  value="<?php echo isset($row['Commentaire']) ? $row['Commentaire'] : ''; ?>"required>
    </div> 
    <div>
        <label for="numberT">numberT</label>
        <input type="number" name="number" id="number" placeholder="Numberof Tickets" required value="<?php echo isset($row['numberT']) ? $row['numberT'] : ''; ?>"required>
    </div> 
    <div>
        <label for="payment">payment</label>
        <input class="input" type="text" id="payment" size="60" name="payment"  value="<?php echo isset($row['payment']) ? $row['payment'] : ''; ?>"required>
    </div> 
    </div>

    <input type="submit" name="update" value="Update">
  </form>
</body>


</html>
<?php
if(isset($_POST['update'])){
    $Id = $_POST['id'];
    $nom=$_POST['Nom'];
    $Adresse=$_POST['Adresse'];
    $email=$_POST['E-mail']; 
    $phone=$_POST['Téléphone'];
    $commentaire=$_POST['Commentaire'];
    $numberrT=$_POST['number'];
    $Payment=$_POST['payment'];

    $req="UPDATE reservation SET Nom='$nom',adresse='$Adresse',Email='$email',Phone='$phone',Commentaire='$commentaire',numberT='$numberrT',payment='$Payment'
    WHERE id='$Id'";

    if($connexion->query($req)===TRUE){
        echo "Modification avec succès";
        header('Location:reservationinfo.php');

    }else{
        echo"Echec de modification".$connexion->error;
    }
}


?>
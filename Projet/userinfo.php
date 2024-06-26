<?php
session_start();

include('connexion.php'); // Connexion
    // Récupérer les informations de l'utilisateur depuis la base de données
    $Nom = $_SESSION['Username'];
    $requete_select = "SELECT * FROM register WHERE Nom='$Nom'"; // Requête SELECT
$resultat_select = $connexion->query($requete_select); // Query
?>

<!-- HTML -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des information</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
        }
        h1 {
            color: #9a889a;
            text-align: center;
        }
        h2 {
            color: #9a28d7;
            text-align: center;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #9a28d7;
            color: #fff;
        }

        tr:hover {
            background-color: #f2f2f2;
        }

        td a {
            display: inline-block;
            text-decoration: none;
            color: #fff;
            background-color: #3E0298;
            padding: 5px 10px;
            border-radius: 5px;
        }

        td a:hover {
            background-color: #9a28d7;
        }
        img {
            width: 130px;
            position: absolute;
            top: 20px;
            left: 20px;
        }

    </style>
</head>

<body>
    <div>
    <a href="index.html"><img src="images/logo.png"></a>
    <h1> Bienvenue <?php echo isset($_SESSION['Username']) ? $_SESSION['Username'] : 'Guest'; ?> !</h1>
    <h2>Liste des informations</h2>
    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Password</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = $resultat_select->fetch_assoc()) { // Boucle while 
                echo "<tr>";
                echo "<td>{$row['Nom']}</td>";
                echo "<td>" . (isset($row['Pass1']) ? $row['Pass1'] : '') . "</td>";
                echo "<td>";
                echo "<a href='update.php?Nom={$row['Nom']}'>Modifier</a>";
                echo "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>
</body>
</html>

<?php
$connexion->close();
?>

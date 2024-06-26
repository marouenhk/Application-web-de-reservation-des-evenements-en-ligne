<?php
session_start();

include('connexion.php'); // Connexion

$requete_select = "SELECT * FROM register"; // Requête SELECT (read)

$resultat_select = $connexion->query($requete_select); // Query
?>

<!-- HTML -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Utilisateurs</title>
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
            width: 150px;
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
    <h2>Liste des Utilisateurs</h2>
    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>E-mail</th>
                <th>Password</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = $resultat_select->fetch_assoc()) { // Boucle while 
                echo "<tr>";
                echo "<td>{$row['Nom']}</td>";
                echo "<td>" . (isset($row['Email']) ? $row['Email'] : '') . "</td>"; // Row : tjib mn base de données
                echo "<td>" . (isset($row['Pass1']) ? $row['Pass1'] : '') . "</td>";
                echo "<td>";
                echo "<a href='update.php?Nom={$row['Nom']}'>Modifier</a>";
                echo "&nbsp;";
                echo "<a href='delete.php?Nom={$row['Nom']}'>Delete</a>"; 
                echo "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>
</body>
<footer>
    <a href="reservationinfo.php"><h2>Liste de réservation </h2></a>
</footer>
</html>

<?php
$connexion->close();
?>

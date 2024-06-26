<?php
session_start();

include('connexion.php'); // Connexion

$requete_select = "SELECT * FROM reservation"; // Requête SELECT (read)

$resultat_select = $connexion->query($requete_select); // Query
?>

<!-- HTML -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des reservations</title>
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
<a href="index.html"><img src="images/logo.png"></a>
    <h1> Bienvenue <?php echo isset($_SESSION['Username']) ? $_SESSION['Username'] : 'Guest'; ?> !</h1>
    <h2>Liste des reservations</h2>
    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>Nom</th>
                <th>adresse</th>
                <th>E-mail</th>
                <th>Phone</th>
                <th>Commentaire</th>
                <th>NumberT</th>
                <th>payment</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = $resultat_select->fetch_assoc()) { // Boucle while 
                echo "<tr>";
                echo "<td>{$row['id']}</td>";
                echo "<td>" . (isset($row['Nom']) ? $row['Nom'] : '') . "</td>"; // Row : tjib mn base de données
                echo "<td>" . (isset($row['adresse']) ? $row['adresse'] : '') . "</td>"; // Row : tjib mn base de données
                echo "<td>" . (isset($row['Email']) ? $row['Email'] : '') . "</td>"; // Row : tjib mn base de données
                echo "<td>" . (isset($row['Phone']) ? $row['Phone'] : '') . "</td>";
                echo "<td>" . (isset($row['Commentaire']) ? $row['Commentaire'] : '') . "</td>";
                echo "<td>" . (isset($row['numberT']) ? $row['numberT'] : '') . "</td>";
                echo "<td>" . (isset($row['payment']) ? $row['payment'] : '') . "</td>";
                echo "<td>";
                echo "<a href='updateRSV.php?id={$row['id']}'>Modifier</a>";
                echo "&nbsp;";
                echo "<a href='deleteRSV.php?id={$row['id']}'>Delete</a>"; // Corrected the href link for delete
                echo "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>

<?php
$connexion->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table Météo</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .container {
            background: rgba(255, 255, 255, 0.1);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.37);
            backdrop-filter: blur(10px);
            width: 90%;
            max-width: 1000px;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 2em;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        }
        th {
            background: rgba(0, 0, 0, 0.5);
        }
        tr:nth-child(even) {
            background: rgba(255, 255, 255, 0.2);
        }
        tr:hover {
            background: rgba(255, 255, 255, 0.3);
        }
        .btn {
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s;
        }
        .btn.modify {
            background: #4caf50;
            color: #fff;
        }
        .btn.modify:hover {
            background: #45a049;
        }
        .btn.delete {
            background: #f44336;
            color: #fff;
        }
        .btn.delete:hover {
            background: #e53935;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Données Météorologiques</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Mois</th>
                    <th>Année</th>
                    <th>FZNA</th>
                    <th>Wind</th>
                    <th>Vis</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Connexion à la base de données
                $conn = new mysqli('localhost', 'root', '', 'rvameteo');

                // Vérifier la connexion
                if ($conn->connect_error) {
                    die("Erreur de connexion : " . $conn->connect_error);
                }

                // Récupération des données
                $sql = "SELECT id, mois, annee, fzna, wind, vis FROM meteo ORDER BY id DESC limit 10";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['mois'] . "</td>";
                        echo "<td>" . $row['annee'] . "</td>";
                        echo "<td>" . $row['fzna'] . "</td>";
                        echo "<td>" . $row['wind'] . "</td>";
                        echo "<td>" . $row['vis'] . "</td>";
                        echo "<td>";
                        echo "<button class='btn modify' onclick='window.location.href=\"modifier.php?id=" . $row['id'] . "\"'>Modifier</button>";
                        echo "<button class='btn delete' onclick='if(confirm(\"Êtes-vous sûr de vouloir supprimer cet enregistrement ?\")) window.location.href=\"supprimer.php?id=" . $row['id'] . "\";'>Supprimer</button>";

                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>Aucune donnée disponible</td></tr>";
                }

                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>

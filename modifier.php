<?php
// Connexion à la base de données
$conn = new mysqli('localhost', 'root', '', 'rvameteo');

// Vérifier la connexion
if ($conn->connect_error) {
    die("Erreur de connexion : " . $conn->connect_error);
}

// Vérifier si un ID est passé via l'URL
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = intval($_GET['id']); // Sécurisation de l'ID

    // Récupérer les données de l'enregistrement à modifier
    $sql = "SELECT id, mois, annee, fzna, wind, vis FROM meteo WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        die("Enregistrement non trouvé !");
    }
} else {
    die("ID non spécifié !");
}

// Mettre à jour l'enregistrement si le formulaire est soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mois = $conn->real_escape_string($_POST['mois']);
    $annee = $conn->real_escape_string($_POST['annee']);
    $fzna = $conn->real_escape_string($_POST['fzna']);
    $wind = $conn->real_escape_string($_POST['wind']);
    $vis = $conn->real_escape_string($_POST['vis']);

    $update_sql = "UPDATE meteo SET mois='$mois', annee='$annee', fzna='$fzna', wind='$wind', vis='$vis' WHERE id=$id";

    if ($conn->query($update_sql) === TRUE) {
        header("Location: listes.php"); // Redirection vers la page principale
        exit;
    } else {
        echo "Erreur lors de la mise à jour : " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Données</title>
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
            max-width: 500px;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"], input[type="number"] {
            margin-bottom: 15px;
            padding: 10px;
            border: none;
            border-radius: 5px;
            font-size: 1em;
        }
        button {
            padding: 10px;
            background: #4caf50;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 1em;
            cursor: pointer;
            transition: background 0.3s;
        }
        button:hover {
            background: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Modifier Données</h1>
        <form method="POST">
            <label for="mois">Mois :</label>
            <input type="text" id="mois" name="mois" value="<?php echo htmlspecialchars($row['mois']); ?>" required>

            <label for="annee">Année :</label>
            <input type="number" id="annee" name="annee" value="<?php echo htmlspecialchars($row['annee']); ?>" required>

            <label for="fzna">FZNA :</label>
            <input type="text" id="fzna" name="fzna" value="<?php echo htmlspecialchars($row['fzna']); ?>" required>

            <label for="wind">Wind :</label>
            <input type="text" id="wind" name="wind" value="<?php echo htmlspecialchars($row['wind']); ?>" required>

            <label for="vis">Vis :</label>
            <input type="text" id="vis" name="vis" value="<?php echo htmlspecialchars($row['vis']); ?>" required>

            <button type="submit">Enregistrer</button>
        </form>
    </div>
</body>
</html>

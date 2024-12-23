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

    // Requête pour supprimer l'enregistrement
    $sql = "DELETE FROM meteo WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        // Redirection vers la page principale après suppression
        header("Location: listes.php");
        exit;
    } else {
        echo "Erreur lors de la suppression : " . $conn->error;
    }
} else {
    echo "ID non spécifié !";
}

$conn->close();
?>

<?php
// Paramètres de connexion à la base de données
$host = 'localhost'; // Remplacez par le nom de votre hôte (ex: localhost)
$dbname = 'rvameteo'; // Remplacez par le nom de votre base de données
$username = 'root'; // Remplacez par votre nom d'utilisateur MySQL
$password = ''; // Remplacez par votre mot de passe MySQL

try {
    // Connexion à la base de données avec PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}

// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $mois = $_POST['mois'] ?? null;
    $annee = $_POST['annee'] ?? null;
    $fzna = $_POST['fzna'] ?? null;
    $wind = $_POST['wind'] ?? null;
    $vis = $_POST['vis'] ?? null;
    $ww = $_POST['ww'] ?? null;
    $cld = $_POST['cld'] ?? null;
    $t = $_POST['t'] ?? null;
    $dp = $_POST['dp'] ?? null;
    $qnh = $_POST['qnh'] ?? null;
    $qfe = $_POST['qfe'] ?? null;
    $trend = $_POST['trend'] ?? null;
    $dates = $_POST['dates'] ?? null;

    // Valider les champs (vous pouvez ajouter plus de validations)
    if (empty($mois) || empty($annee)) {
        echo "Veuillez remplir les champs requis.";
    } else {
        try {
            // Préparer la requête SQL pour insérer les données
            $sql = "INSERT INTO meteo (mois, annee, fzna, wind, vis, ww, cld, t, dp, qnh, qfe, trend, dates) 
                    VALUES (:mois, :annee, :fzna, :wind, :vis, :ww, :cld, :t, :dp, :qnh, :qfe, :trend, :dates)";
            $stmt = $pdo->prepare($sql);

            // Exécuter la requête avec les données du formulaire
            $stmt->execute([
                ':mois' => $mois,
                ':annee' => $annee,
                ':fzna' => $fzna,
                ':wind' => $wind,
                ':vis' => $vis,
                ':ww' => $ww,
                ':cld' => $cld,
                ':t' => $t,
                ':dp' => $dp,
                ':qnh' => $qnh,
                ':qfe' => $qfe,
                ':trend' => $trend,
                ':dates' => $dates,
            ]);

            echo "<script>Swal.fire({
                title: 'message',
                text: 'enregistrement reussi',
                icon: 'success',
                confirmButtonText: 'OK'
            });</script>";
           
        } catch (PDOException $e) {
            echo "Erreur lors de l'enregistrement des données : " . $e->getMessage();
        }
    }
}
?>

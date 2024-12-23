<?php
session_start();

try {
    // Connexion à la base de données
    $pdo = new PDO('mysql:host=localhost;dbname=rvameteo', 'root','');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Vérification du formulaire soumis
    if (isset($_POST['valider'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Vérification des champs vides
        if (empty($username) || empty($password)) {
            $_SESSION['error'] = "Veuillez remplir tous les champs.";
            header('Location: index.php');
            exit();
        }

        // Récupération de l'utilisateur depuis la base de données
        $stmt = $pdo->prepare('SELECT * FROM users WHERE username = :username');
        $stmt->execute(['username' => $username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            // Vérification du mot de passe
            if ($password === $user['password']) {
                // Stockage des informations dans la session
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['role'] = $user['role'];

                // Redirection selon le rôle
                if ($user['role'] === 'admin') {
                    header('Location:admin_dashboard.php');
                } else {
                    header('Location:display.php');
                }
                exit();
            } else {
                $_SESSION['error'] = "Mot de passe incorrect.";
            }
        } else {
            $_SESSION['error'] = "Nom d'utilisateur introuvable.";
        }
    }

    // Retour à la page de connexion en cas d'erreur
    header('Location:index.php');
} catch (PDOException $e) {
    // Gestion des erreurs PDO
    die("Erreur : " . $e->getMessage());
}
?>
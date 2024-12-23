<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Page de Login</title>
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="logg.css">
</head>
<body>
  <div class="login-container">
    <form class="login-form" name="valider" action="actionpage.php" method="POST">
      <h2 class="login-title">Connexion</h2>
      <div class="form-group">
        <label for="username">Nom d'utilisateur</label>
        <input type="text" id="username" name="username" placeholder="Entrez votre nom d'utilisateur" required>
      </div>
      <div class="form-group">
        <label for="password">Mot de passe</label>
        <input type="password" id="password" name="password" placeholder="Entrez votre mot de passe" required>
      </div>
      <button type="submit" name="valider" class="login-btn">Se connecter</button>
      <div class="login-footer">
        <a href="#">Mot de passe oublié ?</a>
      </div>
    </form>
  </div>
</body>
</html>
<?php if (isset($_SESSION['error'])): ?>
  <div class="error-message">
    <?php
    echo $_SESSION['error'];
    unset($_SESSION['error']);
    ?>
  </div>
<?php endif; ?>



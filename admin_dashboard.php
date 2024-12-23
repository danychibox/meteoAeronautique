<?php
session_start();
require_once'savedata.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Interface de Contrôle</title>
  <link rel="stylesheet" href="index.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
  <div class="page">
    <header id="haut">
      <nav>
        <a href="index.php" class="btn">quitter</a>
        <a href="listes.php" class="btn">listes</a>
        <a href="display.php" class="btn">visualiser</a>
      </nav>
    </header>

    <main id="milieu">
      <h3>Interface de Contrôle</h3>
      <form action="admin_dashboard.php" method="post" class="form">
        <div class="form-group">
          <label for="mois">MONTH/MOIS</label>
          <!-- <input type="text" id="mois" name="mois" placeholder="Entrez le mois" /> -->
          <select id="mois" name="mois">
          <option value="" disabled selected>Choisissez une option</option>
          <option value="JANVIER">JANVIER</option>
          <option value="FEVRIER">FEVRIER</option>
          <option value="MARS">MARS</option>
          <option value="AVRIL">AVRIL</option>
          <option value="MAI">MAI</option>
          <option value="JUIN">JUIN</option>
          <option value="JUILLET">JUILLET</option>
          <option value="AOUT">AOUT</option>
          <option value="SEPTEMBRE">SEPTEMBRE</option>
          <option value="OCTOBRE">OCTOBRE</option>
          <option value="NOVEMBRE">NOVEMBRE</option>
          <option value="DECEMBRE">DECEMBRE</option>
          </select>
        </div>

        <div class="form-group">
          <label for="annee">YEAR/ANNEE</label>
          <input type="text" id="annee" name="annee" placeholder="Entrez l'année" />
        </div>

        <div class="form-group">
          <label for="fzna">FZNA</label>
          <select id="fzna" name="fzna">
          <option value="" disabled selected>Choisissez une option</option>
          <option value="METAR">METAR</option>
          <option value="SPECI">SPECI</option>
          </select>
        </div>

        <div class="form-group">
          <label for="wind">WIND</label>
          <input type="text" id="wind" name="wind" placeholder="Entrez WIND" />
        </div>

        <div class="form-group">
          <label for="dates">date et heure</label>
          <input type="text" id="dates" name="dates" placeholder="Entrez la date et l'heure" />
        </div>

        <div class="form-group">
          <label for="vis">VIS</label>
          <input type="text" id="vis" name="vis" placeholder="Entrez VIS" />
        </div>

        <div class="form-group">
          <label for="ww">WW</label>
          <input type="text" id="ww" name="ww" placeholder="Entrez WW" />
        </div>

        <div class="form-group">
          <label for="cld">CLD</label>
          <input type="text" id="cld" name="cld" placeholder="Entrez CLD" />
        </div>

        <div class="form-group">
          <label for="t">T</label>
          <input type="text" id="t" name="t" placeholder="Entrez T" />
        </div>

        <div class="form-group">
          <label for="dp">DP</label>
          <input type="text" id="dp" name="dp" placeholder="Entrez DP" />
        </div>

        <div class="form-group">
          <label for="qnh">QNH</label>
          <input type="text" id="qnh" name="qnh" placeholder="Entrez QNH" />
        </div>

        <div class="form-group">
          <label for="qfe">QFE</label>
          <input type="text" id="qfe" name="qfe" placeholder="Entrez QFE" />
        </div>

        <div class="form-group">
          <label for="trend">TREND</label>
          <input type="text" id="trend" name="trend" placeholder="Entrez TREND" />
        </div>

        <button type="submit" id="validate-btn" class="btn-submit">Enregistrer</button>
      </form>
    </main>
<br>
    <footer id="pied">
      <p>&copy; Chibox</p>
    </footer>
  </div>
</body>
</html>

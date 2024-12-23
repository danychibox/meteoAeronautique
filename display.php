<?php
session_start();

// Paramètres de connexion à la base de données
$host = 'localhost';
$dbname = 'rvameteo';
$username = 'root';
$password = '';

try {
    // Connexion à la base de données
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}

// Récupération des données
try {
    $sql = "SELECT * FROM meteo ORDER BY id DESC limit 1";
    $stmt = $pdo->query($sql);
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erreur lors de la récupération des données : " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rapport Météo</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #000000; /* Fond noir */
            color: #ffffff; /* Texte blanc */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Hauteur de la page entière */
        }

        .container {
            width: 1000px;
            /* height: 80%; */
            background: #ffffff; /* Fond blanc du conteneur */
            color: #333; /* Texte sombre à l'intérieur du conteneur */
            border: 1px solid #dcdcdc;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.5);
        }

        .header {
            background-color: #003366; /* Bleu sombre */
            color: white;
            padding: 10px;
            text-align: center;
            font-size: 20px;
            font-weight: bold;
        }

        .sub-header {
            display: flex;
            justify-content: space-between;
            background-color: #0066cc; /* Bleu plus clair */
            color: white;
            padding: 5px 15px;
            font-size: 14px;
            font-weight: bold;
        }

        .table-container {
            padding: 10px 15px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #dcdcdc;
            text-align: center;
            padding: 8px;
        }

        th {
            background-color: #f5f5f5;
            font-size: 14px;
        }

        td {
            font-size: 12px;
        }

        .highlight {
            background-color: #ffe6e6;
            font-weight: bold;
        }

        .blue-text {
            color: #003366;
            font-weight: bold;
        }

        .footer {
            background-color: #003366;
            color: white;
            text-align: center;
            padding: 5px 0;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 5px;">
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 5px;">
            <div><img src="imgchibox/imgdany.jpg" alt="logo rva goma"  width="160" height="120"></div>
    <div>
    <h4 style="font-size:14px;"> REGIE DES VOIES AERIENNES </h4>
    <h4 style="font-size:14px;"> Aéroport International de Goma </h4>
            <h4 style="font-size:14px;">  Service de la Météo Aéronautique</h4>
    </div></div>
    <div style="padding: 10px;">
       <h4 style="font-size:14px;"> AIRFIELD WEATHER WATCH/ VEILLEE METEO D'AERODROME</h4>
    </div>
</div>
          
        </div>

        <!-- Sub-header -->
        <div class="sub-header">
            <div>WEATHER OBSERVATION</div>
            <div>OBSERVATION METEO</div>
        </div>

        <!-- Table -->
        <div class="table-container">
            <table>
                <tr>
                    <th>MONTH/MOIS</th>
                    <td class="highlight">
                        
                        <?= isset($records[0]['mois']) ? htmlspecialchars($records[0]['mois']) : 'N/A'; ?>
                    </td>
                    <th>YEAR/ANNEE</th>
                    <td class="blue-text">
                        <?= isset($records[0]['annee']) ? htmlspecialchars($records[0]['annee']) : 'N/A'; ?>
                    </td>
                </tr>
                <tr>
                    <th style="border: none;">
                    <table style="width:100%">
                <tr>
                    <td style="border: none;">   <table width="50%" style="border: none;">
                <tr>
                    <th colspan="2" class="highlight" style="border: none;">MET REPORT FZNA</th>
    </tr><tr>
                    <td class="highlight" style="border: none;">SPECI</td>
                    <td class="highlight" style="border: none;">METAR</td>
                </tr>
            </table></td>
                    <td style="border: none;"> FZNA</td>
                </tr>
            </table>
                    </th>
                    <td class="blue-text">
                        
                        <?= isset($records[0]['fzna']) ? htmlspecialchars($records[0]['fzna']) : 'N/A'; ?>
                    </td>
                    <th>WIND</th>
                    <td class="blue-text">
                        <?= isset($records[0]['wind']) ? htmlspecialchars($records[0]['wind']) : 'N/A'; ?>
                    </td>
                </tr>
                <tr>
                    <th>DATE ET HEURE</th>
                    <td class="blue-text">
                        <?= isset($records[0]['vis']) ? htmlspecialchars($records[0]['dates']) : 'N/A'; ?>
                    </td>
                    <th></th>
                    <td class="blue-text">
                       
                    </td>
                </tr>
                <tr>
                    <th>VIS</th>
                    <td class="blue-text">
                        <?= isset($records[0]['vis']) ? htmlspecialchars($records[0]['vis']) : 'N/A'; ?>
                    </td>
                    <th>WW</th>
                    <td class="blue-text">
                        <?= isset($records[0]['ww']) ? htmlspecialchars($records[0]['ww']) : 'N/A'; ?>
                    </td>
                </tr>
                <tr>
                    <th>CLD</th>
                    <td colspan="3">
                        <?= isset($records[0]['cld']) ? htmlspecialchars($records[0]['cld']) : 'N/A'; ?>
                    </td>
                </tr>
                <tr>
                    <th>T</th>
                    <td class="blue-text">
                        <?= isset($records[0]['t']) ? htmlspecialchars($records[0]['t']) : 'N/A'; ?>
                    </td>
                    <th>DP</th>
                    <td class="blue-text">
                        <?= isset($records[0]['dp']) ? htmlspecialchars($records[0]['dp']) : 'N/A'; ?>
                    </td>
                </tr>
                <tr>
                    <th>QNH</th>
                    <td class="blue-text">
                        <?= isset($records[0]['qnh']) ? htmlspecialchars($records[0]['qnh']) : 'N/A'; ?>
                    </td>
                    <th>QFE</th>
                    <td class="blue-text">
                        <?= isset($records[0]['qfe']) ? htmlspecialchars($records[0]['qfe']) : 'N/A'; ?>
                    </td>
                </tr>
                <tr>
                    <th>TREND</th>
                    <td colspan="3" class="blue-text">
                        <?= isset($records[0]['trend']) ? htmlspecialchars($records[0]['trend']) : 'N/A'; ?>
                    </td>
                </tr>
            </table>
        </div>

        <!-- Footer -->
        <div class="footer">
            ©RVA XCHANGE/Goma 2024
        </div>
    </div>
</body>
</html>

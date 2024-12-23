<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather Observation</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #000000; /* Fond noir pour la page */
        }

        .container {
            width: 900px;
            margin: 20px auto;
            background: #ffffff; /* Couleur blanche pour le conteneur */
            border: 1px solid #dcdcdc;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.5);
        }

        .header {
            background-color: #003366;
            color: white;
            padding: 10px;
            text-align: center;
            font-size: 20px;
            font-weight: bold;
        }

        .sub-header {
            display: flex;
            justify-content: space-between;
            background-color: #0066cc;
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
            REGIE DES VOIES AERIENNES <br>
            Aéroport International de Goma <br>
            Service de la Météo Aéronautique
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
                    <td class="highlight">JANV-DEC</td>
                    <th>YEAR/ANNEE</th>
                    <td class="blue-text">2024</td>
                </tr>
                <tr>
                    <th>FZNA</th>
                    <td class="blue-text">011230Z</td>
                    <th>WIND</th>
                    <td class="blue-text">270/10KT</td>
                </tr>
                <tr>
                    <th>VIS</th>
                    <td class="blue-text">7 KM</td>
                    <th>WW</th>
                    <td class="blue-text">-TSRA</td>
                </tr>
                <tr>
                    <th>CLD</th>
                    <td colspan="3">
                        SCT1600FT FEWCB2000FT BKN10000FT
                    </td>
                </tr>
                <tr>
                    <th>T</th>
                    <td class="blue-text">26</td>
                    <th>DP</th>
                    <td class="blue-text">16</td>
                </tr>
                <tr>
                    <th>QNH</th>
                    <td class="blue-text">1020 Hpa</td>
                    <th>QFE</th>
                    <td class="blue-text">846 Hpa</td>
                </tr>
                <tr>
                    <th>TREND</th>
                    <td colspan="3" class="blue-text">NOSIG</td>
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

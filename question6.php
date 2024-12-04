<?php

$villes = [
    'Casablanca' => 20,
    'Marrakech' => 32,
    'Agadir' => 28,
    'Tanger' => 24,
    'Ifrane' => 19,
];


function villeAvecTempMax($villes) {
    $maxTemp = max($villes); 
    $ville = array_search($maxTemp, $villes); 
    return ['ville' => $ville, 'temperature' => $maxTemp];
}


$resultat = villeAvecTempMax($villes);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Températures des Villes</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .table {
            border-collapse: collapse;
            width: 50%;
        }
        .table th, .table td {
            border: 1px solid #ddd;
            text-align: left;
            padding: 8px;
        }
       
        .msg {
            color: red;
        }
       
    </style>
</head>
<body>
    <h2>Températures des Villes</h2>
    <table class="table">
        <tr>
            <th>Ville</th>
            <th>Température (°C)</th>
        </tr>
        <?php foreach ($villes as $ville => $temperature): ?>
            <tr>
                <td><?php echo $ville; ?></td>
                <td><?php echo $temperature; ?>°C</td>
            </tr>
        <?php endforeach; ?>
    </table>

    <p class="msg">
        La ville de <b><?php echo $resultat['ville']; ?></b> a la température la plus élevée avec <b><?php echo $resultat['temperature']; ?>°C</b>.
    </p>
</body>
</html>

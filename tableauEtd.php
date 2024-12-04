<?php
// Tableau associatif imbriqué contenant des informations sur les étudiants et leurs notes
$etudiants = [
    'etudiant1' => [
        'php' => 20,
        'c++' => 15,
        'js' => 18
    ],
    'etudiant2' => [
        'php' => 10,
        'c++' => 12,
        'js' => 14
    ],
    'etudiant3' => [
        'php' => 16,
        'c++' => 17,
        'js' => 19
    ],
   
];


function calculer_moyenne($notes) {
    $somme = array_sum($notes); 
    $nombre_de_matières = count($notes); 
    return $somme / $nombre_de_matières; 
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Résultats des Étudiants</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 8px;
            text-align: center;
            color: blue;
        }
       
        .moyenne {
            font-weight: bold;
            color: blue;
        }
        h2{
            color:blue;
        }
    </style>
</head>
<body>
    <h2>Résultats des Étudiants</h2>

    <table>
        <thead>
            <tr>
                <th>Nom de l'Étudiant</th>
                <th>php</th>
                <th>c++</th>
                <th>js</th>
                <th>Moyenne</th>
            </tr>
        </thead>
        <tbody>
            <?php
            
            foreach ($etudiants as $nom => $notes) {
                $moyenne = calculer_moyenne($notes); 
                echo "<tr>
                        <td>{$nom}</td>
                        <td>{$notes['php']}</td>
                        <td>{$notes['c++']}</td>
                        <td>{$notes['js']}</td>
                        <td class='moyenne'>" . number_format($moyenne, 2) . "</td>
                      </tr>";
            }
            ?>
        </tbody>
    </table>

</body>
</html>

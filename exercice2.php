<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Exercice2</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        form {
            margin-bottom: 20px;
        }
        label{
            color:purple;
        }
    </style>
</head>
<body>
    <form method="POST">
        <label>Recherchez un employé :</label>
        <input type="text" name="nom" placeholder="Entrez le nom" required>
        <button type="submit">Rechercher</button>
    </form>

    <?php
    
    $employees = [
        ['nom' => 'a', 'poste' => 'Développeur', 'salaire' => 9000],
        ['nom' => 'b', 'poste' => 'Juriste', 'salaire' => 7000],
        ['nom' => 'c', 'poste' => 'Manager', 'salaire' => 10000],
        ['nom' => 'd', 'poste' => 'RH', 'salaire' => 8000],
        ['nom' => 'e', 'poste' => 'Comptable', 'salaire' => 6000],
    ];

    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nom = $_POST['nom']; 
        $found = false; 

        foreach ($employees as $emp) {
            if (strtolower($emp['nom']) === strtolower($nom)) {
                echo "<p>
                    <b>Nom :</b> {$emp['nom']}<br>
                    <b>Poste :</b> {$emp['poste']}<br>
                    <b>Salaire :</b> {$emp['salaire']} €
                </p>";
                $found = true;
                break; 
            }
        }

        
        if (!$found) {
            echo  "<p style='color: red;'>Aucun employé trouvé.</p>";
        }
    }
  
   
$users = [
    ['email' => 'user123@example.com', 'password' => 'user123'],
    ['email' => 'a2@example.com', 'password' => 'a1234'],
    ['email' => 'b1@example.com', 'password' => 'b123456'],
];


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $authenticated = false;

 
    foreach ($users as $user) {
        if ($user['email'] === $email && $user['password'] === $password) {
            $authenticated = true;
            break;
        }
    }

  
    if ($authenticated) {
        echo "<p style='color: black; font-family: Arial;'>Connexion réussie ! Bienvenue, {$email}.</p>";
    } else {
        echo "<p style='color: red; font-family: Arial;'>Email ou mot de passe incorrect.</p>";
    }
}


$product = [
    ['nom' => 'Produit A', 'quantite' => 10, 'prix' => 30.00],
    ['nom' => 'Produit B', 'quantite' => 11, 'prix' => 20.00],
    ['nom' => 'Produit C', 'quantite' => 30, 'prix' => 10.00],
];


function calculerTotal($product) {
    $total = 0;
    foreach ($product as $item) {
        $total += $item['quantite'] * $item['prix'];
    }
    return $total;
}


echo "<h3>Votre Panier</h3>";
echo "<table border='1' cellspacing='0' cellpadding='5'>
        <tr>
            <th>Nom</th>
            <th>Quantité</th>
            <th>Prix Unitaire (dhs)</th>
            <th>Sous-Total (dhs)</th>
        </tr>";
foreach ($product as $item) {
    $sousTotal = $item['quantite'] * $item['prix'];
    echo "<tr>
            <td>{$item['nom']}</td>
            <td>{$item['quantite']}</td>
            <td>" . number_format($item['prix'], 2, ',', ' ') . "</td>
            <td>" . number_format($sousTotal, 2, ',', ' ') . "</td>
          </tr>";
}
echo "</table>";


$total = calculerTotal($product);
echo "<p><b>Total du Panier :</b> " . number_format($total, 2, ',', ' ') . " dhs</p>";


?>

<?php

$produits = [
    'Produit A' => 100.00,
    'Produit B' => 470.00,
    'Produit C' => 150.00,
    'Produit D' => 80.00,
    'Produit E' => 200.00,
];


$total = 0;
$produits_selectionnes = [];


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['produits'])) {
    $produits_selectionnes = $_POST['produits'];
    foreach ($produits_selectionnes as $produit) {
       
        $total += $produits[$produit];
    }
}
?>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panier de Produits</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .produit {
            margin-bottom: 10px;
        }
        .total {
            font-size: 1.2em;
            
            margin-top: 20px;
            
        }
       
    </style>
</head>
<body>
    <h2>Choisissez vos produits</h2>
    <form method="POST">
        <?php foreach ($produits as $nom => $prix): ?>
            <div class="produit">
                <input type="checkbox" name="produits[]" value="<?php echo $nom; ?>" id="<?php echo $nom; ?>">
                <label for="<?php echo $nom; ?>"><?php echo $nom; ?> - <?php echo number_format($prix, 2); ?> €</label>
            </div>
        <?php endforeach; ?>

        <button type="submit">Calculer le total</button>
    </form>

    <?php if (!empty($produits_selectionnes)): ?>
        <h3>Produits sélectionnés :</h3>
        <ul>
            <?php foreach ($produits_selectionnes as $produit): ?>
                <li><?php echo $produit . " - " . number_format($produits[$produit], 2); ?> dhs</li>
            <?php endforeach; ?>
        </ul>
        <div class="total">
            Total : <?php echo number_format($total, 2); ?> dhs
        </div>
    <?php endif; ?>



</body>
</html>

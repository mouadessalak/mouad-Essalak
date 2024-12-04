<?php
// Démarrer une session pour stocker les commentaires
session_start();

// Initialiser le tableau des commentaires s'il n'existe pas déjà
if (!isset($_SESSION['comments'])) {
    $_SESSION['comments'] = [];
}

// Vérifier si un commentaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['comment'])) {
    $comment = htmlspecialchars($_POST['comment']); // Sécuriser l'entrée utilisateur
    $timestamp = date("Y-m-d H:i:s"); // Horodatage actuel

    // Ajouter le commentaire et l'horodatage au tableau
    $_SESSION['comments'][] = [
        'comment' => $comment,
        'timestamp' => $timestamp,
    ];
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Commentaires</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        form {
            margin-bottom: 20px;
        }
        .comment {
            border: 1px solid #ddd;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            
        }
        .timestamp {
            font-size: 0.8em;
            color: #555;
        }
        h2 {
            color: purple;
        }
    </style>
</head>
<body>
    <h2>Votre commentaire</h2>
    <form method="POST">
        <textarea name="comment" rows="4" cols="50" placeholder="Veuillez laisser un commentaire" required></textarea><br>
        <button type="submit">Soumettre</button>
    </form>

    <h2>Commentaires</h2>
    <?php
    if (!empty($_SESSION['comments'])) {
        foreach ($_SESSION['comments'] as $entry) {
            echo "<div class='comment'>
                    <p>" . nl2br($entry['comment']) . "</p>
                    <span class='timestamp'>Posté le : {$entry['timestamp']}</span>
                  </div>";
        }
    } else {
        echo "<p>Aucun commentaire pour le moment.</p>";
    }
    ?>
</body>
</html>

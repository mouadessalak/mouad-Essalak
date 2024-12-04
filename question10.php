<?php
session_start();

if (!isset($_SESSION['users'])) {
    $_SESSION['users'] = [
        1 => ['nom' => 'name1', 'email' => 'name1@example.com'],
        2 => ['nom' => 'name2', 'email' => 'name2@example.com'],
        3 => ['nom' => 'name3', 'email' => 'name3@example.com']
    ];
}

if (isset($_POST['ajouter'])) {
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $id = count($_SESSION['users']) + 1;
    $_SESSION['users'][$id] = ['nom' => $nom, 'email' => $email];
}

if (isset($_POST['modifier'])) {
    $id = $_POST['id'];
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    if (isset($_SESSION['users'][$id])) {
        $_SESSION['users'][$id] = ['nom' => $nom, 'email' => $email];
    }
}

if (isset($_POST['supprimer'])) {
    $id = $_POST['id'];
    if (isset($_SESSION['users'][$id])) {
        unset($_SESSION['users'][$id]);
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Utilisateurs</title>
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
        }
        form {
            margin-bottom: 20px;
        }
        input[type="text"], input[type="email"], select {
            width: 50%;
            height: 40px; 
            padding: 5px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        button {
            padding: 10px 15px;
            background-color: blue;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: darkviolet;
        }
        h2, h3 {
            color: blue; 
        }
    </style>
</head>
<body>

<h2>Gestion des Utilisateurs</h2>

<h3>Ajouter un utilisateur</h3>
<form method="POST">
    <input type="text" name="nom" placeholder="Nom" required>
    <input type="email" name="email" placeholder="Email" required>
    <button type="submit" name="ajouter">Ajouter</button>
</form>

<h3>Modifier un utilisateur</h3>
<form method="POST">
    <select name="id" required>
        <option value="">Sélectionnez un utilisateur</option>
        <?php foreach ($_SESSION['users'] as $id => $user): ?>
            <option value="<?php echo $id; ?>"><?php echo $user['nom']; ?></option>
        <?php endforeach; ?>
    </select>
    <input type="text" name="nom" placeholder="Nom" required>
    <input type="email" name="email" placeholder="Email" required>
    <button type="submit" name="modifier">Modifier</button>
</form>

<h3>Supprimer un utilisateur</h3>
<form method="POST">
    <select name="id" required>
        <option value="">Sélectionnez un utilisateur</option>
        <?php foreach ($_SESSION['users'] as $id => $user): ?>
            <option value="<?php echo $id; ?>"><?php echo $user['nom']; ?></option>
        <?php endforeach; ?>
    </select>
    <button type="submit" name="supprimer">Supprimer</button>
</form>

<h3>Liste des Utilisateurs</h3>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Email</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($_SESSION['users'] as $id => $user): ?>
            <tr>
                <td><?php echo $id; ?></td>
                <td><?php echo $user['nom']; ?></td>
                <td><?php echo $user['email']; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>

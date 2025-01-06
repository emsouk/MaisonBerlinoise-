<?php
// Connexion à la base de données
$host = 'localhost';
$dbname = 'maisonBerlinoise';
$username = 'root'; // ou ton utilisateur
$password = ''; // ton mot de passe MySQL si nécessaire

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Erreur de connexion : ' . $e->getMessage();
}

// Récupérer les cocktails depuis la base de données
$stmt = $pdo->query('SELECT * FROM cocktails');
$cocktails = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="maison.css">
    <title>Liste des Cocktails</title>
</head>
<body>
    <h1>Nos Cocktails</h1>
    <div>
        <?php foreach ($cocktails as $cocktail): ?>
            <div class="cocktail">
                <h2><?= htmlspecialchars($cocktail['name']) ?></h2>
                <img src="<?= htmlspecialchars($cocktail['image_url']) ?>" alt="<?= htmlspecialchars($cocktail['name']) ?>" width="200">
                <p><strong>Description:</strong> <?= htmlspecialchars($cocktail['description']) ?></p>
                <p><strong>Ingrédients:</strong> <?= htmlspecialchars($cocktail['ingredients']) ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>

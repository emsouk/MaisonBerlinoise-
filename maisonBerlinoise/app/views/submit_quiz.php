
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maison Berlinoise</title>
    <link rel="stylesheet" href="/maisonBerlinoise/app/assets/css/maison.css">
    <link rel="stylesheet" href="/maisonBerlinoise/app/assets/css/quizz.css">
</head>

<body class="submit_quizz">

<header> 
    <nav>   
        <div class="logo">
            <a href="/maisonBerlinoise/app/views/page1View.php">MAISON BERLINOISE</a>
        </div>
    </nav>      
</header> 

<main>
    <img class="squelette" src="/maisonBerlinoise/app/assets/images/logo/logo.png" alt="" srcset="">
     <?php 
// Récupérer le score de l'utilisateur (par exemple après calcul des réponses correctes)
$score = 8; // Exemple de score, remplace par ta logique
$user_name = "Utilisateur"; // Récupéré dynamiquement via un formulaire ou autre

// Connexion à la base de données
$host = 'localhost';
$dbname = 'maisonBerlinoise';
$username = 'root';
$password = '';

// Connexion à la base de données
$dsn = "mysql:host=localhost;dbname=maisonBerlinoise;charset=utf8";
$user = "root";
$password = ""; // Remplace par ton mot de passe si nécessaire
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Erreur de connexion : ' . $e->getMessage();
    exit;
}

// Récupérer les questions du quiz
$stmt = $pdo->query('SELECT * FROM questions');
$questions = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Vérifier que toutes les questions ont été répondues
$missingAnswers = [];
foreach ($questions as $index => $question) {
    $fieldName = "question_$index";
    if (!isset($_POST[$fieldName])) {
        $missingAnswers[] = $question['question_text']; // Stocker les questions non répondues
    }
}

if (!empty($missingAnswers)) {
    // Afficher un message d'erreur si des réponses manquent
    echo "<h2>Oups, tu as oublié ces questions.</h2> <br>";
    echo "<ul>";
    foreach ($missingAnswers as $missing) {
        echo "<li>" . htmlspecialchars($missing) . "</li>";
    }
    echo "</ul>";
    echo '<a href="javascript:history.back()"> <br>Retourner au formulaire</a>';
    exit;
}

// Si toutes les questions sont répondues, traiter les réponses

// Ajouter ici la logique pour calculer le score et générer les recommandations

try {
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Trouver un cocktail en fonction du score
    $stmt = $pdo->prepare("
        SELECT name, description, ingredients, image_url
        FROM cocktails
        WHERE
            CASE
                WHEN :score BETWEEN 0 AND 5 THEN score_range = '0-5'
                WHEN :score BETWEEN 6 AND 10 THEN score_range = '6-10'
                WHEN :score > 10 THEN score_range = '11-20'
            END
        ORDER BY RAND() -- Choisir un cocktail aléatoire dans la plage
        LIMIT 1
    ");
    $stmt->execute([':score' => $score]);

    $cocktail = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($cocktail) {
        // Enregistrer le score et la recommandation
        $stmtInsert = $pdo->prepare("
            INSERT INTO quiz_scores (user_name, score, recommended_cocktail)
            VALUES (:user_name, :score, :recommended_cocktail)
        ");
        $stmtInsert->execute([
            ':user_name' => $user_name,
            ':score' => $score,
            ':recommended_cocktail' => $cocktail['name'],
        ]);


        // Afficher la recommandation
        echo "Nous vous recommandons de goûter le cocktail : <strong>{$cocktail['name']}</strong>.<br><br>";
        echo "<img src='{$cocktail['image_url']}' alt='{$cocktail['name']}' style='width:200px;'><br><br>";
        echo "<em>Description :</em> {$cocktail['description']}<br>";
        echo "<em>Ingrédients :</em>  {$cocktail['ingredients']}";
    } else {
        echo "Aucun cocktail recommandé pour ce score.";
    }
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>
</main>

<footer>
        <p>Copyright © 2019 - <em>MAISON BERLINOISE</em> - Tous droits réservés</p>
</footer>
<script src="/maisonBerlinoise/app/js/script.js"></script>
</body>
</html>

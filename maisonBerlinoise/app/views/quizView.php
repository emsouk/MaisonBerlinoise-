<?php
// Connexion à la base de données
$host = 'localhost';
$dbname = 'maisonBerlinoise';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Erreur de connexion : ' . $e->getMessage();
}

// Récupérer les questions du quiz depuis la base de données
$stmt = $pdo->query('SELECT * FROM questions');
$questions = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz de Cocktails</title>
    <link rel="stylesheet" href="/maisonBerlinoise/app/assets/css/quizz.css">
    <link rel="stylesheet" href="/maisonBerlinoise/app/assets/css/maison.css">
</head>

<header> 
    <nav>   
        <div class="logo">
            <a href="/maisonBerlinoise/app/views/page1View.php">MAISON BERLINOISE</a>
        </div> 
    </nav>  
</header>

<body class="quizz"> 
<h1>Apprenons nous à nous connaitre</h1>
<div class="submitQuiz">
    <form action="submit_quiz.php" method="POST">
        <?php  foreach ($questions as $index => $question): ?>
            <div class="question">
                <p><?= htmlspecialchars($question['question_text']) ?></p>
                <label>
                    <input type="radio" name="question_<?= $index ?>" value="A"> <?= htmlspecialchars($question['option_a']) ?>
                </label><br>
                <label>
                    <input type="radio" name="question_<?= $index ?>" value="B"> <?= htmlspecialchars($question['option_b']) ?>
                </label><br>
                <label>
                    <input type="radio" name="question_<?= $index ?>" value="C"> <?= htmlspecialchars($question['option_c']) ?>
                </label><br>
            </div>
        <?php endforeach; ?>
</div>
        <input class="submit" type="submit" value="J'ai soif !">      
    </form>

<footer>
    <p>Copyright © 2019 - <em>MAISON BERLINOISE</em> - Tous droits réservés</p>
</footer>
</body>
</html>

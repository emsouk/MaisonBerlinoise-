<?php

// index.php

require_once 'app/controllers/MainController.php';
require_once 'app/controllers/PageController.php';
require_once 'app/controllers/CarteController.php';


use App\Controllers\MainController;
use App\Controllers\PageController;
use App\Controllers\CarteController;


// Connexion à la base de données
$pdo = new PDO("mysql:host=localhost;dbname=maisonBerlinoise", 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Récupérer l'action depuis l'URL
$action = $_GET['action'] ?? 'main';

switch ($action) {

    case 'page1':
        $pageController = new PageController();
        $pageController->showPage1();
        break;

    case 'carte':
        $carteController = new CarteController();
        $carteController->showCarte();
        break;

    case 'main':
    default:
        $mainController = new MainController();
        $mainController->showHomePage();
        break;
}

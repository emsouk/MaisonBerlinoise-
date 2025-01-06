<?php

namespace App\Controllers;

class MainController
{
    public function showHomePage()
    {
        // Tu peux ajouter des données dynamiques ici si nécessaire
        $title = "Maison Berlinoise";

        // Inclure la vue principale
        require 'app/views/mainView.php';
    }
}

<?php

namespace App\Controllers;

class CarteController
{
    public function showCarte()
    {
        // Inclure la vue de la carte
        require 'app/views/carteView.php';
    }
}

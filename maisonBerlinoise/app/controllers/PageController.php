<?php

namespace App\Controllers;

class PageController
{
    public function showPage1()
    {
        // Données dynamiques si nécessaire
        $pageTitle = "Page 1";

        // Inclure la vue
        require 'app/views/page1View.php';
    }
}

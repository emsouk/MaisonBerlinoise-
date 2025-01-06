<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page 1</title>
    <link rel="stylesheet" href="/maisonBerlinoise/app/assets/css/maison.css">
</head>

<body class="page1">
    <header> 
        <nav>   
            <div class="logo">
                <a href="#">MAISON BERLINOISE</a>
            </div>
            <div class="links">      
                <a onclick="togglePopup()" href="#">LA CARTE</a>
            </div>   
        </nav>  
    </header>

<main>
    <div id="popup-overlay">
        <div class="popup-content"> 
            <h2>WILKOMEN</h2>
            <iframe src="https://gifer.com/embed/WUUT" width=100 height=100 frameBorder="0" allowFullScreen></iframe>
            <p>
                <em><strong>Maison Berlinoise</strong></em> réinvente l’art de déguster un cocktail. <br>
                L'art du sur-mesure. 
            </p>
            <a href="/maisonBerlinoise/app/views/carteView.php" class="popup-link">LA CARTE</a>
            <a href="javascript:void(0);" onclick="togglePopup()" class="popup-exit">Fermer</a>
        </div>  
    </div>

<video autoplay muted loop>
    <source src="/maisonBerlinoise/app/assets/images/photos/barman.mp4" type="video/mp4">
    Votre navigateur ne supporte pas les vidéos. 
</video>
    <div class="texteVideo">
        <p>
            <h1>WILKOMMEN</h1><br>
            On fait des cocktails cool pour des gens cool <em>!</em><br>
            Chez <em><strong>MAISON BERLINOISE</strong></em>, notre but <em>?</em><br> Oubliez que vous êtes à Toulouse, c’est parti <em>!</em>
        </p>
    </div> 
        <p class="horaire">
            HORAIRE D’OUVERTURE <br> <strong>TOUS LES JOURS </strong><br>   17H - 4H              
        </p>
   
    <div class="images">
        <img src="/maisonBerlinoise/app/assets/images/photos/berlin.jpg" alt="Cocktail">
        <img src="/maisonBerlinoise/app/assets/images/photos/berlin3.jpg" alt="Cocktail">
        <img src="/maisonBerlinoise/app/assets/images/photos/berlin2.jpg" alt="Cocktail">
        <img src="/maisonBerlinoise/app/assets/images/photos/berlin4.jpg" alt="Cocktail">
        <img src="/maisonBerlinoise/app/assets/images/photos/berlin5.jpg" alt="Cocktail">
    </div>

    <div class="localisation">
    <h3> NOUS RETROUVER </h3>
    <p> 2 Rue Irène et Joliot Curie, <br>
        31520 Ramonville-Saint-Agne
    </p>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6626.695207192224!2d1.480865976594707!3d43.5513618711072!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12aebe7f818273e9%3A0x100c24fa51a58a9b!2sADRAR%20Formation!5e1!3m2!1sfr!2sfr!4v1736162565582!5m2!1sfr!2sfr" width="300" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</main>

    <footer>
        <p>Copyright © 2019 - <em>MAISON BERLINOISE</em> - Tous droits réservés</p>
    </footer>  

    <script src="/maisonBerlinoise/app/js/script.js"></script>
</body>

</html>

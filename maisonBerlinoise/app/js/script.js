
    function togglePopup(){
    let popup = document.querySelector('#popup-overlay');
    popup.classList.toggle("open");
}

let logo = document.querySelector('#logo');
let text = document.querySelector('#text');

window.addEventListener('scroll', function() {
    let scrollDistance = window.scrollY;
    
    if (scrollDistance > 100) {
        
        logo.style.transform = 'scale(6)'; // Agrandissement de l'image
        logo.style.clipPath = 'circle(100% at 50% 50%)'; // Le cercle s'agrandit pour révéler le texte      
        logo.style.opacity = '0'; // L'image devient progressivement transparente
        text.style.opacity = '1'; // Le texte devient visible
         
    } else {
      
        logo.style.transform = 'scale(1)'; // L'image reprend sa taille initiale
        logo.style.clipPath = 'circle(60% at 50% 50%)'; // Le cercle rétrécit 
        logo.style.opacity = '1'; // L'image redevient visible
        text.style.opacity = '0'; // Le texte se cache 
    }
});





//script for music/games button/logo link shortcut functionality.
let musicLogosId;
let musicLogosButton;
let musicButtonClicked = false;
let gamesLogosId;
let gamesLogosButton;
let gamesButtonClicked = false;

let logoNattsmyg = document.getElementById("logoNattsmyg");
let logoColloblast = document.getElementById("logoColloblast");
let logoStormshade = document.getElementById("logoStormshade");
let logoCosmicCompanions = document.getElementById("logoCosmicCompanions");
let logoMushroomMusical = document.getElementById("logoMushroomMusical");

musicLogosId = document.getElementById("musicLogos");
musicLogosButton = document.getElementById("musicButton");

gamesLogosId = document.getElementById("gamesLogos");
gamesLogosButton = document.getElementById("gamesButton");

musicLogosButton.addEventListener("click", () => {
     if (musicButtonClicked === false){
         musicLogosId.style.display = 'block';
         musicButtonClicked = true;         
     } 
 });

gamesLogosButton.addEventListener("click", () => {
    if (gamesButtonClicked === false){
        gamesLogosId.style.display = 'block';
        gamesButtonClicked = true;        
    } 
});

musicLogosId.addEventListener("mouseleave", () => {
        musicLogosId.style.display = 'none'; 
        musicButtonClicked = false;
});
gamesLogosId.addEventListener("mouseleave", () => {
    gamesLogosId.style.display = 'none'; 
    gamesButtonClicked = false;
});

logoNattsmyg.addEventListener("click", () => {
    musicLogosId.style.display = 'none';  
});
logoColloblast.addEventListener("click", () => {
    musicLogosId.style.display = 'none';    
});

logoStormshade.addEventListener("click", () => {
   gamesLogosId.style.display = 'none';  
});
logoCosmicCompanions.addEventListener("click", () => {
    gamesLogosId.style.display = 'none';    
});
logoMushroomMusical.addEventListener("click", () => {
    gamesLogosId.style.display = 'none';    
});
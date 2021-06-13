/* Affiche le menu déroulant pour la déconnexion en cliquant sur le bouton de profil */
function profilFunction() {
    document.getElementById("dropdown-profil").classList.toggle("show-profil");
}

window.onclick = function(event) {
    if (!event.target.matches('.dropdown-profil-menu')) {

        var dropdownsProfil = document.getElementsByClassName("dropdown-profil");
        var i;
        for (i = 0; i < dropdownsProfil.length; i++) {
            var openDropdownProfil = dropdownsProfil[i];
            if (openDropdownProfil.classList.contains('show-profil')) {
                openDropdownProfil.classList.remove('show-profil');
            }
        }
    }
}

/* Affiche le menu responsive en cliquant sur le bouton hamburger */
/*function menuFunction() {
    document.getElementById("dropdown-profil").classList.toggle("show-profil");
}

window.onclick = function(event) {
    if (!event.target.matches('.dropdown-profil-menu')) {

        var dropdownsProfil = document.getElementsByClassName("dropdown-profil");
        var i;
        for (i = 0; i < dropdownsProfil.length; i++) {
            var openDropdownProfil = dropdownsProfil[i];
            if (openDropdownProfil.classList.contains('show-profil')) {
                openDropdownProfil.classList.remove('show-profil');
            }
        }
    }
}*/
var sidebarOpened = false;
var menu = document.getElementById("menu-collapse");
var sideMenu = document.getElementById("sidebar-menu");

menu.addEventListener('click', ( e ) => {

    sideMenu.classList.toggle( "open" );

})


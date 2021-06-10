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
var sidebarOpened = false;
var menu = document.getElementById("menu-collapse");
menu.addEventListener('click', function(e){
    e.stopPropagation();
    e.preventDefault();
    document.body.classList.add('add-sidebar-menu');
    document.body.classList.remove('remove-sidebar-menu');
    sidebarOpened = true;
});
document.body.addEventListener('click', function(){
    if(sidebarOpened){
        document.body.classList.add('remove-sidebar-menu');
        document.body.classList.remove('add-sidebar-menu');
    }
});
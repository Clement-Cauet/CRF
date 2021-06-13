/* Gestion Button */
document.getElementById('retour').hidden = true;
document.getElementById('cancel').hidden = true;
for(var i=0; i<4; i++){
    document.getElementsByClassName('insert')[i].hidden = true;
}

/* Gestion Div */
document.getElementById('gestionBenevole').hidden = true;
document.getElementById('gestionPharmacie').hidden = true;
document.getElementById('gestionBaseLog').hidden = true;
document.getElementById('gestionVestiaire').hidden = true;

/* Gestion Form */
document.getElementById('formBenevole').hidden = true;

/* Show Elements */
var benevole = document.getElementById('benevole');
benevole.addEventListener('click', function(){
    document.getElementById('menu').hidden = true;
    document.getElementById('retour').hidden = false;
    document.getElementById('insertBenevole').hidden = false;

    document.getElementById('gestionBenevole').hidden = false;
});

var pharmacie = document.getElementById('pharmacie');
pharmacie.addEventListener('click', function(){
    document.getElementById('menu').hidden = true;
    document.getElementById('retour').hidden = false;
    document.getElementById('insertBenevole').hidden = false;

    document.getElementById('gestionPharmacie').hidden = false;
});

var baseLog = document.getElementById('baseLog');
baseLog.addEventListener('click', function(){
    document.getElementById('menu').hidden = true;
    document.getElementById('retour').hidden = false;
    document.getElementById('insertBenevole').hidden = false;

    document.getElementById('gestionBaseLog').hidden = false;
});

var vestiaire = document.getElementById('vestiaire');
vestiaire.addEventListener('click', function(){
    document.getElementById('menu').hidden = true;
    document.getElementById('retour').hidden = false;
    document.getElementById('insertBenevole').hidden = false;

    document.getElementById('gestionVestiaire').hidden = false;
});

var retour = document.getElementById('retour');
retour.addEventListener('click', function(){
    document.getElementById('menu').hidden = false;
    document.getElementById('retour').hidden = true;
    document.getElementById('cancel').hidden = true;
    for(var i=0; i<4; i++){
        document.getElementsByClassName('insert')[i].hidden = true;
    }

    document.getElementById('gestionBenevole').hidden = true;
    document.getElementById('gestionPharmacie').hidden = true;
    document.getElementById('gestionBaseLog').hidden = true;
    document.getElementById('gestionVestiaire').hidden = true;
    document.getElementById('insertBenevole').hidden = true;
    document.getElementById('formBenevole').hidden = true;
});

/* Insert Elements */
var insertBenevole = document.getElementById('insertBenevole');
insertBenevole.addEventListener('click', function(){
    document.getElementById('cancel').hidden = false;

    document.getElementById('insertBenevole').hidden = true;
    document.getElementById('formBenevole').hidden = false;
});

var cancel = document.getElementById('cancel');
cancel.addEventListener('click', function(){
    document.getElementById('cancel').hidden = true;
    
    document.getElementById('insertBenevole').hidden = false;
    document.getElementById('formBenevole').hidden = true;
});
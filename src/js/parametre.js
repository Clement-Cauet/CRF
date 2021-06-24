/* Gestion Button */
document.getElementById('retour').hidden = true;
var cancel = document.getElementsByClassName('cancel');
for(var i=0; i<cancel.length; i++){
    cancel[i].hidden = true;
}
var insert = document.getElementsByClassName('insert');
for(var i=0; i<insert.length; i++){
    insert[i].hidden = true;
}

/* Gestion Div */
document.getElementById('gestionBenevole').hidden = true;
document.getElementById('gestionPharmacie').hidden = true;
document.getElementById('gestionBaseLog').hidden = true;
document.getElementById('gestionVestiaire').hidden = true;
document.getElementById('gestionMainCourante').hidden = true;
document.getElementById('gestionActualite').hidden = true;

/* Gestion Form */
document.getElementById('formBenevole').hidden = true;
document.getElementById('formActualite').hidden = true;

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

var mainCourante = document.getElementById('mainCourante');
mainCourante.addEventListener('click', function(){
    document.getElementById('menu').hidden = true;
    document.getElementById('retour').hidden = false;

    document.getElementById('gestionMainCourante').hidden = false;
});

var actualite = document.getElementById('actualite');
actualite.addEventListener('click', function(){
    document.getElementById('menu').hidden = true;
    document.getElementById('retour').hidden = false;
    document.getElementById('insertArticle').hidden = false;

    document.getElementById('gestionActualite').hidden = false;
});

var retour = document.getElementById('retour');
retour.addEventListener('click', function(){
    document.getElementById('menu').hidden = false;
    document.getElementById('retour').hidden = true;
    var cancel = document.getElementsByClassName('cancel');
    for(var i=0; i<cancel.length; i++){
        cancel[i].hidden = true;
    }
    var insert = document.getElementsByClassName('insert');
    for(var i=0; i<insert.length; i++){
        insert[i].hidden = true;
    }

    document.getElementById('gestionBenevole').hidden = true;
    document.getElementById('gestionPharmacie').hidden = true;
    document.getElementById('gestionBaseLog').hidden = true;
    document.getElementById('gestionVestiaire').hidden = true;
    document.getElementById('gestionActualite').hidden = true;
    document.getElementById('insertBenevole').hidden = true;
    document.getElementById('formBenevole').hidden = true;
    document.getElementById('formActualite').hidden = true;
});

/* Insert Elements */
var insertBenevole = document.getElementById('insertBenevole');
insertBenevole.addEventListener('click', function(){
    document.getElementById('cancelBenevole').hidden = false;

    document.getElementById('insertBenevole').hidden = true;
    document.getElementById('formBenevole').hidden = false;
});

var cancelBenevole = document.getElementById('cancelBenevole');
cancelBenevole.addEventListener('click', function(){
    document.getElementById('cancelBenevole').hidden = true;
    
    document.getElementById('insertBenevole').hidden = false;
    document.getElementById('formBenevole').hidden = true;
});

var insertArticle = document.getElementById('insertArticle');
insertArticle.addEventListener('click', function(){
    document.getElementById('cancelArticle').hidden = false;

    document.getElementById('insertArticle').hidden = true;
    document.getElementById('formActualite').hidden = false;
});

var cancelArticle = document.getElementById('cancelArticle');
cancelArticle.addEventListener('click', function(){
    document.getElementById('cancelArticle').hidden = true;
    
    document.getElementById('insertArticle').hidden = false;
    document.getElementById('formActualite').hidden = true;
});
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
document.getElementById('formPharmacie').hidden = true;
document.getElementById('formBaseLog').hidden = true;
document.getElementById('formVestiaire').hidden = true;
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
    document.getElementById('insertPharmacie').hidden = false;

    document.getElementById('gestionPharmacie').hidden = false;
});

var baseLog = document.getElementById('baseLog');
baseLog.addEventListener('click', function(){
    document.getElementById('menu').hidden = true;
    document.getElementById('retour').hidden = false;
    document.getElementById('insertBaseLog').hidden = false;

    document.getElementById('gestionBaseLog').hidden = false;
});

var vestiaire = document.getElementById('vestiaire');
vestiaire.addEventListener('click', function(){
    document.getElementById('menu').hidden = true;
    document.getElementById('retour').hidden = false;
    document.getElementById('insertVestiaire').hidden = false;

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
    document.getElementById('gestionMainCourante').hidden = true;
    document.getElementById('gestionActualite').hidden = true;
    document.getElementById('formBenevole').hidden = true;
    document.getElementById('formPharmacie').hidden = true;
    document.getElementById('formBaseLog').hidden = true;
    document.getElementById('formVestiaire').hidden = true;
    document.getElementById('formActualite').hidden = true;
});

/* Insert Elements */
//Insert Bénévole
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

//Insert Pharmacie
var insertPharmacie = document.getElementById('insertPharmacie');
insertPharmacie.addEventListener('click', function(){
    document.getElementById('cancelPharmacie').hidden = false;

    document.getElementById('insertPharmacie').hidden = true;
    document.getElementById('formPharmacie').hidden = false;
});

var cancelPharmacie = document.getElementById('cancelPharmacie');
cancelPharmacie.addEventListener('click', function(){
    document.getElementById('cancelPharmacie').hidden = true;
    
    document.getElementById('insertPharmacie').hidden = false;
    document.getElementById('formPharmacie').hidden = true;
});

//Insert BaseLog
var insertBaseLog = document.getElementById('insertBaseLog');
insertBaseLog.addEventListener('click', function(){
    document.getElementById('cancelBaseLog').hidden = false;

    document.getElementById('insertBaseLog').hidden = true;
    document.getElementById('formBaseLog').hidden = false;
});

var cancelBaseLog = document.getElementById('cancelBaseLog');
cancelBaseLog.addEventListener('click', function(){
    document.getElementById('cancelBaseLog').hidden = true;
    
    document.getElementById('insertBaseLog').hidden = false;
    document.getElementById('formBaseLog').hidden = true;
});

//Insert Vestiare
var insertVestiaire = document.getElementById('insertVestiaire');
insertVestiaire.addEventListener('click', function(){
    document.getElementById('cancelVestiaire').hidden = false;

    document.getElementById('insertVestiaire').hidden = true;
    document.getElementById('formVestiaire').hidden = false;
});

var cancelVestiaire = document.getElementById('cancelVestiaire');
cancelVestiaire.addEventListener('click', function(){
    document.getElementById('cancelVestiaire').hidden = true;
    
    document.getElementById('insertVestiare').hidden = false;
    document.getElementById('formVestiaire').hidden = true;
});

//Insert Article
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
/* Gestion Button */
document.getElementById('retour').hidden = true;

/* Gestion Div */
document.getElementById('gestionBenevole').hidden = true;
document.getElementById('gestionPharmacie').hidden = true;
document.getElementById('gestionBaseLog').hidden = true;
document.getElementById('gestionVestiaire').hidden = true;

/* Show Elements */
var benevole = document.getElementById('benevole');
benevole.addEventListener('click', function(){
    document.getElementById('benevole').hidden = true;
    document.getElementById('pharmacie').hidden = true;
    document.getElementById('baseLog').hidden = true;
    document.getElementById('vestiaire').hidden = true;
    document.getElementById('retour').hidden = false;

    document.getElementById('gestionBenevole').hidden = false;
    count('user');
});

var pharmacie = document.getElementById('pharmacie');
pharmacie.addEventListener('click', function(){
    document.getElementById('benevole').hidden = true;
    document.getElementById('pharmacie').hidden = true;
    document.getElementById('baseLog').hidden = true;
    document.getElementById('vestiaire').hidden = true;
    document.getElementById('retour').hidden = false;

    document.getElementById('gestionPharmacie').hidden = false;
});

var baseLog = document.getElementById('baseLog');
baseLog.addEventListener('click', function(){
    document.getElementById('benevole').hidden = true;
    document.getElementById('pharmacie').hidden = true;
    document.getElementById('baseLog').hidden = true;
    document.getElementById('vestiaire').hidden = true;
    document.getElementById('retour').hidden = false;

    document.getElementById('gestionBaseLog').hidden = false;
});

var vestiaire = document.getElementById('vestiaire');
vestiaire.addEventListener('click', function(){
    document.getElementById('benevole').hidden = true;
    document.getElementById('pharmacie').hidden = true;
    document.getElementById('baseLog').hidden = true;
    document.getElementById('vestiaire').hidden = true;
    document.getElementById('retour').hidden = false;

    document.getElementById('gestionVestiaire').hidden = false;
});

var retour = document.getElementById('retour');
retour.addEventListener('click', function(){
    document.getElementById('benevole').hidden = false;
    document.getElementById('pharmacie').hidden = false;
    document.getElementById('baseLog').hidden = false;
    document.getElementById('vestiaire').hidden = false;
    document.getElementById('retour').hidden = true;

    document.getElementById('gestionBenevole').hidden = true;
    document.getElementById('gestionPharmacie').hidden = true;
    document.getElementById('gestionBaseLog').hidden = true;
    document.getElementById('gestionVestiaire').hidden = true;
});

/* Insert, Update, Delete, Cancel */
var nbr;
function count(table, nbr) {
    fetch("./src/api/count.php", {
        method: "post",
        body: JSON.stringify({
            table : table
        })
    }).then(function(response){
        return response.json();        
    }).then(function (data){
        nbr = data
    });
}

document.getElementById('cancel').hidden = true;
document.getElementById('confirm').hidden = true;
for(var i=0; i<8; i++){
    document.getElementsByClassName('inputUpdate')[i].hidden = true;
}
for(var i=0; i<2; i++){
    document.getElementsByClassName('tabCheckbox')[i].hidden = true;
}

var insert = document.getElementById('insert');
insert.addEventListener('click', function(){
    document.getElementById('insert').hidden = true;
    document.getElementById('update').hidden = true;
    document.getElementById('suppr').hidden = true;
    document.getElementById('cancel').hidden = false;
    document.getElementById('confirm').hidden = false;
});

var update = document.getElementById('update');
update.addEventListener('click', function(){
    document.getElementById('insert').hidden = true;
    document.getElementById('update').hidden = true;
    document.getElementById('suppr').hidden = true;
    document.getElementById('cancel').hidden = false;
    document.getElementById('confirm').hidden = false;
    for(var i=0; i<400; i++){
        document.getElementsByClassName('data')[i].hidden = true;
        document.getElementsByClassName('inputUpdate')[i].hidden = false;
    }
});

var suppr = document.getElementById('suppr');
suppr.addEventListener('click', function(){
    document.getElementById('insert').hidden = true;
    document.getElementById('update').hidden = true;
    document.getElementById('suppr').hidden = true;
    document.getElementById('cancel').hidden = false;
    document.getElementById('confirm').hidden = false;

    for(var i=0; i<2; i++){
        document.getElementsByClassName('tabCheckbox')[i].hidden = false;
    }
});

var cancel = document.getElementById('cancel');
cancel.addEventListener('click', function(){
    document.getElementById('insert').hidden = false;
    document.getElementById('update').hidden = false;
    document.getElementById('suppr').hidden = false;
    document.getElementById('cancel').hidden = true;
    document.getElementById('confirm').hidden = true;
    for(var i=0; i<8; i++){
        document.getElementsByClassName('data')[i].hidden = false;
        document.getElementsByClassName('inputUpdate')[i].hidden = true;
    }
    for(var i=0; i<2; i++){
        document.getElementsByClassName('tabCheckbox')[i].hidden = true;
    }
});

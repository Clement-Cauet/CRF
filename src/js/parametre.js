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

function tablelink(e){
    e.parentNode.querySelector('div');
    form(e.parentNode.id);
}

function form(id) {
    fetch("./src/edit/benevole.php", {
        method: "post",
        body: JSON.stringify({
            id : id
        }).then((res) => { 
            return res.json() 
        }
        ).then((data) => { 
            console.log(data) 
        })
    });

}
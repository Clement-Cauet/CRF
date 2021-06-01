var update = document.getElementById('update');
var save = document.getElementById('save');
var cancel = document.getElementById('cancel');

save.hidden = true;
cancel.hidden = true;
for(var i=0; i<3; i++){
    document.getElementsByClassName('quantiteView')[i].hidden = false;
    document.getElementsByClassName('quantiteNumber')[i].hidden = true;
}

update.addEventListener('click', function() {
    save.hidden = false;
    cancel.hidden = false;
    for(var i=0; i<3; i++){
        document.getElementsByClassName('quantiteView')[i].hidden = true;
        document.getElementsByClassName('quantiteNumber')[i].hidden = false;
    }
    cancel.addEventListener('click', function() {
        save.hidden = true;
        cancel.hidden = true;
        for(var i=0; i<3; i++){
            document.getElementsByClassName('quantiteView')[i].hidden = false;
            document.getElementsByClassName('quantiteNumber')[i].hidden = true;
        }
    }); 
});


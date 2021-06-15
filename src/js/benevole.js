document.getElementById('suppr_confirm').hidden = true;
document.getElementById('cancel').hidden = true;


var suppr = document.getElementById('suppr');
suppr.addEventListener('click', function(){
    document.getElementById('suppr').hidden = true;
    document.getElementById('suppr_confirm').hidden = false;
    document.getElementById('cancel').hidden = false;
});

var cancel = document.getElementById('cancel');
cancel.addEventListener('click', function(){
    document.getElementById('suppr').hidden = false;
    document.getElementById('suppr_confirm').hidden = true;
    document.getElementById('cancel').hidden = true;
});
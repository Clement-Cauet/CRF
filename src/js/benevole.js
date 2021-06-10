var save = document.getElementById('save');
save.addEventListener('click', function(){
    var nivol = document.getElementById('nivol').value;
    var login = document.getElementById('login').value;
    var mdp = document.getElementById('mdp').value;
    var nom = document.getElementById('nom').value;
    var prenom = document.getElementById('prenom').value;
    var admin = document.getElementById('admin').value;
    var id = document.getElementById('id').value;

    update(nivol, login, mdp, nom, prenom, admin, id);
});

function update (nivol, login, mdp, nom, prenom, admin, id) {
    fetch("../api/updateUser.php", {
        method: "post",
        body: JSON.stringify({
            nivol : nivol,
            login : login,
            mdp : mdp,
            nom : nom,
            prenom : prenom,
            admin : admin,
            id : id
        })
    });
}
/*for(var i=0; i<3; i++){

    quantite.addEventListener('change', function(){
        try{
            fetch('src/api/update.php', {
                method: 'post'
            }).then(function(response){
                return response.json();        
            }).then(function (data){
                var obj = {"etat": data};
                console.log(JSON.parse(JSON.stringify(obj)));
            })
        }catch (error){
            console.error(error);
        }
    });
}*/

for(var i=0; i<3; i++){

    var quantite = document.getElementsByClassName('quantite')[i];
    var quantiteValue = document.getElementsByClassName('quantite')[i].value;
    var id = document.getElementsByClassName('id')[i].innerHTML;

    var decrement = document.getElementsByClassName('decrement')[i];
    var increment = document.getElementsByClassName('increment')[i];

    decrement.addEventListener('click', function(){
        quantiteValue--;
        quantite.value = quantiteValue;
        alert('coucou');
    });
    increment.addEventListener('click', function(){
        quantiteValue++;
        quantite.value = quantiteValue;
    });
}
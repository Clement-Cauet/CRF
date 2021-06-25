function option(e){
    var option = document.getElementById('option-message['+e+']');
    option.classList.toggle("show-option");
}

function update(e){
    var updateMessage = document.getElementById('updateMessage['+e+']');
    var updateSubmit = document.getElementById('updateSubmit['+e+']');
    document.getElementById('paragraph['+e+']').hidden = true;
    updateMessage.classList.toggle("show-update");
    updateSubmit.classList.toggle("show-update");
}

window.onclick = function(event){
    if (!event.target.matches('.updateMessage')){
        var updateMessage = document.getElementsByClassName("updateMessage");
        for(var i=0; i<updateMessage.length; i++){
            var openUpdateMessage = updateMessage[i];
            if (openUpdateMessage.classList.contains('show-update')) {
                openUpdateMessage.classList.remove('show-update');
            }
        }
        var updateSubmit = document.getElementsByClassName("updateSubmit");
        for(var i=0; i<updateSubmit.length; i++){
            var openUpdateSubmit = updateSubmit[i];
            if (openUpdateSubmit.classList.contains('show-update')) {
                openUpdateSubmit.classList.remove('show-update');
            }
        }
        var messageContent = document.getElementsByClassName("messageContent");
        for(var i=0; i<messageContent.length; i++){
            messageContent[i].hidden = false;
        }
    }
}
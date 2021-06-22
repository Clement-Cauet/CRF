function show(e){
    var button = document.getElementById("fa-chevron-down["+e+"]");
    var paragraph = document.getElementById("paragraph["+e+"]");
    var editor = document.getElementById("editor["+e+"]");
    button.classList.toggle("rotate-button");
    paragraph.classList.toggle("show-news");
    editor.classList.toggle("show-news");
}


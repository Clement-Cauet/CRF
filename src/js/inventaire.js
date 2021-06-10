function reduce ( e ) {

    const quantite = e.parentNode.querySelector('input[type=number]')
        , table    = e.parentNode.parentNode.parentNode;

    quantite.stepDown();

    // Style for the table
    table.style.color = quantite.value < parseInt(quantite.parentNode.dataset.min)
        ? "#CC0000" : "#000000";
    quantite.style.color = quantite.value < parseInt(quantite.parentNode.dataset.min)
        ? "#CC0000" : "#000000";

    table.style.fontWeight = quantite.value < parseInt(quantite.parentNode.dataset.min)
        ? "bold" : "normal";
    quantite.style.color = quantite.value < parseInt(quantite.parentNode.dataset.min)
        ? "bold" : "normal";

    update( e.parentNode.id, quantite.value );
}

function add ( e ) {

    const quantite = e.parentNode.querySelector('input[type=number]')
        , table    = e.parentNode.parentNode.parentNode;

    quantite.stepUp();

    // Style for the table
    table.style.color = quantite.value < parseInt(quantite.parentNode.dataset.min)
        ? "#CC0000" : "#000000";
    table.style.fontWeight = quantite.value < parseInt(quantite.parentNode.dataset.min)
        ? "bold" : "normal";

    table.style.fontWeight = quantite.value < parseInt(quantite.parentNode.dataset.min)
        ? "bold" : "normal";
    quantite.style.color = quantite.value < parseInt(quantite.parentNode.dataset.min)
        ? "#CC0000" : "#000000";

    update( e.parentNode.id, quantite.value );
}

function update (id, quantity) {
    fetch("./src/api/update.php", {
        method: "post",
        body: JSON.stringify({
            id : id,
            quantity : quantity
        })
    });
}

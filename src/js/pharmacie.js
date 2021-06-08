function reduce (e) {
    const quantite = e.parentNode.querySelector('input[type=number]');
    const table = e.parentNode.querySelector('td');

    quantite.stepDown();

    // Style for the table
    quantite.style.color = quantite.value < parseInt(quantite.parentNode.dataset.min)
        ? "#CC0000" : "#000000";
    quantite.style.fontWeight = quantite.value < parseInt(quantite.parentNode.dataset.min)
        ? "bold" : "normal";
    /*table.style.color = quantite.value < parseInt(quantite.parentNode.dataset.min)
        ? "#CC0000" : "#000000";
    table.style.fontWeight = quantite.value < parseInt(quantite.parentNode.dataset.min)
        ? "bold" : "normal";*/
    update(e.parentNode.id, quantite.value);
}

function add (e) {
    const quantite = e.parentNode.querySelector('input[type=number]');

    quantite.stepUp();
    quantite.style.color = quantite.value < parseInt(quantite.parentNode.dataset.min)
        ? "#CC0000" : "#000000";
    quantite.style.fontWeight = quantite.value < parseInt(quantite.parentNode.dataset.min)
        ? "bold" : "normal";
    update(e.parentNode.id, quantite.value);
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

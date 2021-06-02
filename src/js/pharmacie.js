function reduce ( e ) {

    const element = e.parentNode.querySelector('input[type=number]')
    element.stepDown()
    element.style.color = element.value < parseInt(element.parentNode.dataset.min)
        ? "#CC0000" : "#939393"
    update( e.parentNode.id, element.value )

}

function add ( e ) {

    const element = e.parentNode.querySelector('input[type=number]');
    element.stepUp();

    element.style.color = element.value < parseInt(element.parentNode.dataset.min)
        ? "#CC0000" : "#939393"

    update( e.parentNode.id, element.value );

}

function update ( id, quantity ) {

    fetch("./src/api/update.php", {
        method: "post",
        body: JSON.stringify({
            id      : id,
            quantity: quantity
        })
    });

}

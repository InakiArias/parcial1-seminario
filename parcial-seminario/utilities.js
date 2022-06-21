function validarCant(cant) {
    if (cant < 1)
        return 1;
    else if (cant > 10)
        return 10;

    return cant;
}

function borrarInputs(cant) {
    let inputs = document.querySelectorAll(".inputValor");

    for (let i = cant * 4; i < inputs.length; i++)
        inputs[i].remove();

    document.querySelector("button")?.remove();
}

function crearInputs(cant) {
    let form = document.querySelector("form");
    let inputs = document.querySelectorAll(".inputValor");
    let cantActual = inputs.length / 4;

    for (let i = cantActual + 1; i <= cant; i++) {
        let html = `<input class="inputValor" type="number" id="cod${i}" name="cod${i}" required>
            <input class="inputValor" type="text" id="desc${i}" name="desc${i}" required>
            <input class="inputValor" type="number" id="cant${i}" name="cant${i}" required>
            <input class="inputValor" type="number" id="precio${i}" name="precio${i}" required>
        `;

        form.insertAdjacentHTML("beforeend", html);
    }

    let boton = '<button type="submit">Enviar</button>';

    form.insertAdjacentHTML("beforeend", boton);
}

function actualizarFilas(input) {
    input.value = validarCant(input.value);

    borrarInputs(input.value);

    crearInputs(input.value);    
}

actualizarFilas(document.querySelector("#cantidadElementos"));
document.getElementById('fecha').value = new Date().toISOString().substring(0, 10);
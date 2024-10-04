function cor(valor) {
    if (valor > 0) {
        document.getElementById("result").style.backgroundColor = "green";
    }
    else if (valor < 0) {
        document.getElementById("result").style.backgroundColor = "red";
    }
    else {
        document.getElementById("result").style.backgroundColor = "gray";
    }
}

function mostra() {
    document.getElementById("plus").style.display = "inline";
    document.getElementById("buttonMais").style.display = "none";
    document.getElementById("buttonMenos").style.display = "inline";
    document.getElementById("tipoCalculadora").textContent = "Calculadora Científica";
}
function apaga() {
    document.getElementById("plus").style.display = "none";
    document.getElementById("buttonMenos").style.display = "none";
    document.getElementById("buttonMais").style.display = "inline";
    document.getElementById("tipoCalculadora").textContent = "Calculadora";
}

function valor1() {
    return parseFloat(document.getElementById("valor1").value);
}
function valor2() {
    return parseFloat(document.getElementById("valor2").value);
}

function soma() {
    var result = Math.round((valor1() + valor2()) * 100) / 100;

    cor(result);
    document.getElementById("result").value = result;
}
function subt() {
    var result = Math.round((valor1() - valor2()) * 100) / 100;

    cor(result);
    document.getElementById("result").value = result;
}
function mult() {
    var result = Math.round((valor1() * valor2()) * 100) / 100;

    cor(result);
    document.getElementById("result").value = result;
}
function div() {
    var result = Math.round((valor1() / valor2()) * 100) / 100;

    cor(result);
    document.getElementById("result").value = result;
}
function expo() {
    var result = Math.round(Math.pow(valor1(),valor2()) * 100) / 100;

    cor(result);
    document.getElementById("result").value = result;
}
function raiz() {
    var result = Math.round(Math.sqrt(valor1()) * 100) / 100;

    cor(result);
    document.getElementById("result").value = result;
}
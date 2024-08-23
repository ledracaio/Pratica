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
}
function apaga() {
    document.getElementById("plus").style.display = "none";
    document.getElementById("buttonMenos").style.display = "none";
    document.getElementById("buttonMais").style.display = "inline";
}

function soma() {
    var valor1 = document.getElementById("valor1").value;
    var valor2 = document.getElementById("valor2").value;
    var result = Math.round((parseFloat(valor1) + parseFloat(valor2)) * 100) / 100;

    cor(result);
    document.getElementById("result").value = result;
}
function subt() {
    var valor1 = document.getElementById("valor1").value;
    var valor2 = document.getElementById("valor2").value;
    var result = Math.round((parseFloat(valor1) - parseFloat(valor2)) * 100) / 100;

    cor(result);
    document.getElementById("result").value = result;
}
function mult() {
    var valor1 = document.getElementById("valor1").value;
    var valor2 = document.getElementById("valor2").value;
    var result = Math.round((parseFloat(valor1) * parseFloat(valor2)) * 100) / 100;

    cor(result);
    document.getElementById("result").value = result;
}
function div() {
    var valor1 = document.getElementById("valor1").value;
    var valor2 = document.getElementById("valor2").value;
    var result = Math.round((parseFloat(valor1) / parseFloat(valor2)) * 100) / 100;

    cor(result);
    document.getElementById("result").value = result;
}
function expo() {
    var valor1 = document.getElementById("valor1").value;
    var valor2 = document.getElementById("valor2").value;
    var result = Math.round(Math.pow(parseFloat(valor1),parseFloat(valor2)) * 100) / 100;

    cor(result);
    document.getElementById("result").value = result;
}
function raiz() {
    var valor1 = document.getElementById("valor1").value;
    var valor2 = document.getElementById("valor2").value;
    var result = Math.round(Math.sqrt(parseFloat(valor1)) * 100) / 100;

    cor(result);
    document.getElementById("result").value = result;
}
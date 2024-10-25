import './bootstrap';

$(document).ready(function () {
    $('.cpf-mask').mask('000.000.000-00'); // Máscara para CPF
    console.log("Máscara aplicada ao CPF"); // Verifica se o código está sendo executado
});

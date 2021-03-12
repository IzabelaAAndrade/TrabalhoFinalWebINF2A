/*
  Grupo F - desenvolvido por Mayara Mendes
*/

$(document).ready(function () {
    var $campoCpf = $("#cpf");
    $campoCpf.mask('000.000.000-00', {reverse: true});
});
$(document).ready(function () {
    var $campoCep = $("#cep");
    $campoCep.mask('00000-000', {reverse: true});
});
$(document).ready(function () {
    var $campoData = $("#data");
    $campoData.mask('00/00/0000', {reverse: true});
});

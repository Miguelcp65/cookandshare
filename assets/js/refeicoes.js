$('#orderclass').on('click', function() {
    window.location.href = "receitas_refeicoes.php?ordem=class";
});
$('#orderrecentes').on('click', function() {
    window.location.href = "receitas_refeicoes.php?ordem=recentes";
});
$('#orderalfa').on('click', function() {
    window.location.href = "receitas_refeicoes.php?ordem=alfa";
});
$("#1").css("opacity", "100%");
$("#1").css("border", "5px solid #D17240");
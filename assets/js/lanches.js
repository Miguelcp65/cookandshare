$('#orderclass').on('click', function() {
    window.location.href = "receitas_lanches.php?ordem=class";
});
$('#orderrecentes').on('click', function() {
    window.location.href = "receitas_lanches.php?ordem=recentes";
});
$('#orderalfa').on('click', function() {
    window.location.href = "receitas_lanches.php?ordem=alfa";
});
$("#5").css("opacity", "100%");
$("#5").css("border", "5px solid #D17240");
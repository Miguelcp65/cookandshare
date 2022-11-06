$('#orderclass').on('click', function() {
    window.location.href = "receitas_sopas.php?ordem=class";
});
$('#orderrecentes').on('click', function() {
    window.location.href = "receitas_sopas.php?ordem=recentes";
});
$('#orderalfa').on('click', function() {
    window.location.href = "receitas_sopas.php?ordem=alfa";
});
$("#4").css("opacity", "100%");
$("#4").css("border", "5px solid #D17240");
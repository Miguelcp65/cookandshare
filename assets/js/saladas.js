$('#orderclass').on('click', function() {
    window.location.href = "receitas_saladas.php?ordem=class";
});
$('#orderrecentes').on('click', function() {
    window.location.href = "receitas_saladas.php?ordem=recentes";
});
$('#orderalfa').on('click', function() {
    window.location.href = "receitas_saladas.php?ordem=alfa";
});
$("#3").css("opacity", "100%");
$("#3").css("border", "5px solid #D17240");
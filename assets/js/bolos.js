$('#orderclass').on('click', function() {
    window.location.href = "receitas_bolos.php?ordem=class";
});
$('#orderrecentes').on('click', function() {
    window.location.href = "receitas_bolos.php?ordem=recentes";
});
$('#orderalfa').on('click', function() {
    window.location.href = "receitas_bolos.php?ordem=alfa";
});

$("#6").css("opacity", "100%");
$("#6").css("border", "5px solid #D17240");
document.querySelector('.img__btn').addEventListener('click', function() {
    document.querySelector('.cont').classList.toggle('s--registar');
});
$('.unmask').on('click', function() {
    if ($(this).prev('input').attr('type') == 'password')
        $(this).prev('input').prop('type', 'text');
    else
        $(this).prev('input').prop('type', 'password');
    return false;
});
var p_c = $('#p-c');
var p = $('#p');
if (p.val() != p_c.val()) {
    $('#registar').attr("disabled", true);
} else {
    $('#registar').attr("disabled", false);
}
//Begin supreme heuristics 
$('.password').on('keyup', function() {
    if (p.val().length > 0) {
        if (p.val() != p_c.val()) {
            $('#valid').html("As Passwords não coincidem!");
            $('#registar').attr("disabled", true);
        } else {
            $('#valid').html('');
            $('#registar').attr("disabled", false);
        }
        var s = 'Fraca'
        if (p.val().length > 5 && p.val().match(/\d+/g))
            s = 'Média';
        if (p.val().length > 6 && p.val().match(/[^\w\s]/gi))
            s = 'Forte';
        $('#strong span').addClass(s).html(s);
    }
});
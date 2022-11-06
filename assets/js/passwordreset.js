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
    $('#repor').attr("disabled", true);
} else {
    $('#repor').attr("disabled", false);
}
//Begin supreme heuristics 
$('.password').on('keyup', function() {
    if (p.val().length > 0) {
        if (p.val() != p_c.val()) {
            $('#valid').html("As Passwords não coincidem!");
            $('#repor').attr("disabled", true);
        } else {
            $('#valid').html('');
            $('#repor').attr("disabled", false);
        }
        var s = 'Fraca'
        if (p.val().length > 5 && p.val().match(/\d+/g))
            s = 'Média';
        if (p.val().length > 6 && p.val().match(/[^\w\s]/gi))
            s = 'Forte';
        $('#strong span').addClass(s).html(s);
    }
});
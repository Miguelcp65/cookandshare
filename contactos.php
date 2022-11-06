<?php
include 'db.php';
session_start();
?>
<html>
<head>
    <meta charset="utf-8">
    <title>Contactos</title>
    <script src="//code.jquery.com/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0" />
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" href="assets\css\contactos.css">
</head>

<body>
<?php include("includes/navsU.php");
?>

    <div class="container">
        <br><br>
        <h1>Contacte-nos</h1>
        <br><br>
        <div class="row">

            <!-- form -->
            <div class="col-md-6" id="div-form">
                <form action="#" method="post">
                    <div class="row">
                        <div class="col">
                            <label for="primNome">Nome</label> <br>
                            <input type="text" class="form-control" id="primNome" maxlength="150" minlength="6" required>
                            <small id="avisoPNome" class="form-text text-danger" hidden>Campo obrigatório</small>
                        </div>
                    </div>

                    <br>
                    <div class="row">
                        <div class="col">
                            <label for="email">Email</label> <br>
                            <input type="email" class="form-control" id="email" maxlength="150" minlength="6" required>
                            <small id="avisoEmail" class="form-text text-danger" hidden>Campo obrigatório</small>
                        </div>
                    </div>

                    <br>
                    <br>
                    <div class="row">
                        <div class="col">
                            <label for="areaTexto">Mensagem</label>
                            <textarea class="form-control" id="areaTexto" rows="3" maxlength="500" minlength="6" required></textarea>
                            <small id="avisoMsg" class="form-text text-danger" hidden>Campo obrigatório</small>
                        </div>
                    </div>

                    <br>
                    <div class="row">
                        <div class="col">
                            <button type="button" class="btn btn-primary btn-lg btn-block" id="btnSubmit">Enviar</button>
                        </div>
                    </div>

                </form>
            </div>

            <!-- faq -->
            <div class="col-md-6" id="div-faq">
                <p class="text-center">Confirme no centro de Apoio ao Cliente se o seu motivo de contacto poderá ser resolvido de forma automática</p>

                <a href="perguntas.php" id="anc-seta">
                    <svg class="bi bi-chevron-double-right" viewBox="0 0 16 16" fill="currentColor" id="svg-seta">
            <path fill-rule="evenodd" d="M3.646 1.646a.5.5 0 01.708 0l6 6a.5.5 0 010 .708l-6 6a.5.5 0 01-.708-.708L9.293 8 3.646 2.354a.5.5 0 010-.708z" clip-rule="evenodd"/>
            <path fill-rule="evenodd" d="M7.646 1.646a.5.5 0 01.708 0l6 6a.5.5 0 010 .708l-6 6a.5.5 0 01-.708-.708L13.293 8 7.646 2.354a.5.5 0 010-.708z" clip-rule="evenodd"/>
          </svg>
                </a>

            </div>



        </div>
    </div>
    <script>
        $(document).ready(function() {

            $("#primNome").attr("pattern", ".*[^ ].*");
            $("#ultNome").attr("pattern", ".*[^ ].*");
            $("#email").attr("pattern", "^\\w+@[a-zA-Z_]+?\\.[a-zA-Z]{2,3}$");
            $("#tel").attr("pattern", "^([9]{1})+(6|3|2|1{1})+([0-9]{7})$");

            $("#btnSubmit").click(function() {
                if ($("#primNome").val() == "") {
                    $("#avisoPNome").attr("hidden", false);
                } else if ($("#ultNome").val() == '') {
                    $("#avisoUNome").attr("hidden", false);
                } else if ($("#email").val() == '') {
                    $("#avisoEmail").attr("hidden", false);
                } else if ($("#endereco").val() == '') {
                    $("#avisoEndereco").attr("hidden", false);
                } else if ($("#genero").val() == '') {
                    $("#avisoGenero").attr("hidden", false);
                } else if ($("#areaTexto").val() == '') {
                    $("#avisoMsg").attr("hidden", false);
                }
            });
        });
    </script>
   
</body>

</html>
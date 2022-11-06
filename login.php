<?php
include 'db.php';
?>
<html>
  <head>
    <meta charset="utf-8">
    <title>CN'S | Login</title>
    <script src="//code.jquery.com/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="assets\css\login.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/toastr.css">
    <script src="assets/js/toastr.js"></script>
  </head>
  <body>
   
  <form method="post" action="includes\login.inc.php">
<h1 class="tip">Iniciar Sessão</h1>
<div class="cont" id="cont">
  <div class="login">
    <h2>Bem-vindo de volta!</h2>
    <label>
      <span>Email</span>
      <input type="email" name="email" required/>
    </label>
    <label>
      <span>Password</span>
      <input type="password" minlength="8" name="password" required/>
    </label>
    <div class="forgot-pass">
    <a href="#passreset" data-toggle="modal" data-target="#passreset">Esqueceu-se da password?</a>
    </div>
    <button type="submit" name="login" class="submit">Login</button>
  </div>
  <div class="sub-cont">
    <div class="img">
      <div class="img__text m--up">
        <h2>É novo aqui?</h2>
        <p>Crie conta para descobrir novos sabores!</p>
      </div>
      <div class="img__text m--in">
        <h2>Já tem conta?</h2>
        <p>Se já tem conta, inicie sessão!</p>
      </div>
      <div class="img__btn">
        <span class="m--up">Registar</span>
        <span class="m--in">Login</span>
   
      </div>
    </div>
    </form>

    
    <form method="post" action="includes\registar.inc.php">
    <div class="registar">
      <h2>Descubra e partilhe novas receitas!</h2>
      <label>
        <span>Nome</span>
        <input type="text" name="nome" required/>
      </label>
      <label>
        <span>Apelido</span>
        <input type="text" name="apelido" required/>
      </label>
      <label>
        <span>Email</span>
        <input type="email" name="email" required/>
      </label>
      <label>
        <span>Password</span>
        <p>
      <input type="password" minlength="8" id="p" name="password" class="password" required>
      <!--      <button class="unmask" type="button"></button> -->
    
        <div id="strong"><span></span></div>
    
    <small>A Password tem de ter pelo menos 8 caracteres</small>
      </label>
      </p>
      <label>
        <span>Repita a Password</span>
        <p>
        <input type="password" minlength="8" class="password" id="p-c" name="rpassword" required/>
  <!--      <button class="unmask" type="button"></button> -->
        <div id="valid"></div>
      </label>
      </p>
      <button type="submit" name="registar" id="registar" class="submit">Registar</button>
    </div>

  </div>
</div>
</form>

<div class="modal fade" id="passreset" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="recpass">Recuperar Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="includes\passwordreset.inc.php">
      <div class="modal-body">
          <div class="form-group">
            <label for="emailipt" class="col-form-label">Insira o seu Email:</label>
            <input type="email" name="email" class="form-control" id="emailipt" required>
            <p style="color: red; font-size: 13pt; display: none;" id="erro_email">O email não foi encontrado!</p>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
        <button type="submit" name="resetpass" class="btn btn-primary">Enviar Email</button>
        </form>
      </div>
    </div>
  </div>
</div>




<?php

if (isset($_SERVER['HTTP_REFERER'])){
$pagina= $_SERVER['HTTP_REFERER'];
$url = $pagina;
$url = strtok($url, "?");
}
if (isset($_GET["report"])){
    if ($_GET["report"] == "email-usado") {
      echo' <script>toastr.error("O Email já está a ser utilizado");</script>';
      echo("<script>history.replaceState({},'','$url');</script>");
      echo("<script>
      var contt = document.getElementById('cont');
      contt.classList.toggle('s--registar');</script>");
    }if ($_GET["report"] == "nao-registado") {
      echo' <script>toastr.error("O Email não está registado");</script>';
      echo("<script>history.replaceState({},'','$url');</script>");
    } if ($_GET["report"] == "password-errada") {
      echo' <script>toastr.error("A Password está incorreta");</script>';
      echo("<script>history.replaceState({},'','$url');</script>");
    } if ($_GET["report"] == "email-nao-existe") {
      echo("<script>jQuery(document).ready(function(e) {jQuery('#passreset').modal();});</script>");
      echo("<script>document.getElementById('erro_email').style.display = 'inline';</script>");
      echo("<script>history.replaceState({},'','$url');</script>");
    } if ($_GET["report"] == "passreset-email-enviado") {
      echo' <script>toastr.success("Verifique o seu email para repôr a sua password!");</script>';
      echo("<script>history.replaceState({},'','$url');</script>");
    } if ($_GET["report"] == "passreset-password-reposta") {
      echo' <script>toastr.success("A sua password foi reposta com sucesso!");</script>';
      echo("<script>history.replaceState({},'','$url');</script>");
    } if ($_GET["report"] == "passreset-ocorreu-erro") {
      echo' <script>toastr.error("Ocorreu um erro ao repôr a password!");</script>';
      echo("<script>history.replaceState({},'','$url');</script>");
    }
}

if (isset($_SESSION['email'])) {
  header("Location: receitas.php");
exit();
}
?>
<?php include("includes/footer.html");
?>
  </body>
  <script src="assets\js\login.js"></script>
</html>


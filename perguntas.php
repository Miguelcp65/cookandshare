<?php
include 'db.php';
session_start();
include("includes/sessao.php");
?>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/perguntas.css">
    <title>CN'S | Perguntas Frequentes</title>
</head>

<body>
<?php 
include("includes/navsU.php");
if (isset($_SESSION['id'])) {
  $user_id_se = $_SESSION['id'];
  $user_id_se = intval($user_id_se); 
}
?>
 <div class="dbreadcrumb" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="receitas.php">Início</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="adicionar_receita.php">Perguntas Frequentes</a></li>
        </ol>
    </div>
    <div class="form">
        <h1 class="titulo">Perguntas Frequentes</h1>
        <div class="pergs">
        <h1 class="per">Onde posso publicar uma receita?</h1>
        <h2><i class="fas fa-angle-right"></i> Pode fazê-lo no menu "Painel de Receitas, e na opção "Adicionar Receita"</h2>
        <br>
        <h1 class="per">Onde posso consultar as minhas receitas?</h1>
        <h2> <i class="fas fa-angle-right"></i> Pode consultar as suas receitas no menu "Painel de receitas"</h2>
        <br>
        <h1 class="per">Perguntas Frequentes</h1>
        <h2> <i class="fas fa-angle-right"></i> Pode fazê-lo no menu "Painel de Receitas, e na opção "Receitas Favoritas"</h2>
        <br>
        <h1 class="per">Esqueci-me da minha password, como posso recupera-la?</h1>
        <h2> <i class="fas fa-angle-right"></i> Na página do login, está um link para repor a sua password, através do seu email</h2>
        <br>
        <h1 class="per">Quais são as vantagens de ser um utilizador verificado?</h1>
        <h2> <i class="fas fa-angle-right"></i> Os utilizadores verificados poderão adicionar receitas novas, classificar receitas existentes ou reportar receitas de outros utilizadores</h2>
        <br>
        </div>
    </div>
    <?php include("includes/footer.html");
?>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>
</html>
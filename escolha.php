<?php
include 'db.php';
session_start();
?>
<html>
  <head>
    <meta charset="utf-8">
    <title>CN'S | Login</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0" />
    <script src="//code.jquery.com/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="assets\css\escolha.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/toastr.css">
    <script src="assets/js/toastr.js"></script>
  </head>
  <body>
   
<?php

$_SESSION['nivel'] = intval($_SESSION['nivel']);  
if  ($_SESSION['nivel'] != 2){
    header("Location: index.php");
}
?>

<h1>Redirecionar para:</h1>
<ul class="opcoes">
    <li onclick="location.href = '/admin/tabelas/ingredientes_lista.php';" class="admin"><a href="#">Administração</a></li>
    <li onclick="location.href = 'index.php';" class="user"><a href="#">Utilizador</a></li>
    </ul>
  </body>
</html>


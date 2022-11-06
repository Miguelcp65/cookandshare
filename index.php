<?php
include 'db.php';
session_start();
?>
<!DOCTYPE html>
<html lang="pt" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>CN'S | Inicio</title>
    <script src="//code.jquery.com/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="assets\css\index.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
  </head>
  <body>
   
  <?php include("includes/navsU.php"); ?>
        <!-- Conteúdo da Página -->
        <div class="hero">
        <div class="banner">
            <div class="left-column">
                <h1>Cook&<span>Share</span></h1>
                <h3>Nunca foi tão fácil cozinhar</h3> <br>
                <p>
                    Preparar um simples almoço para família, criar um smoothie saudável, impressionar os convidados com
                    um jantar sofisticado  <br>
                    Garantindo que cozinha sempre a refeição perfeita para a sua família e amigos.
                </p>
                <br>
                <div class="btn">
                  <a href="#video"><button type="button" class=" primary-btn"> Assita ao Video </button></a>
                  <a href="#sobren"><button  type="button">Sobre nós</button></a>
               
                </div>
            </div>
            <div class="right-column">
                <img id="imgPrincipal" src="assets/img/food.jpg" alt="">
            </div>
        </div>
        <div id="video" class="video">
        <h2 class="video">Vídeo</h2>
        <br>
        <br>
        <video autoplay controls loop id="myVideo">
            <source src="assets/img/video.mp4" type="video/mp4">
            O seu navegador não suporta HTML5 video.
            </video>
        </div>
        <!--ABOUT US-->
        <br><br><br>
        <div class ="about-section">
            <div class ="title">
                <h2 class="sobren">Sobre Nós</h2>
            </div>
            <div id="sobren" class ="about-text">
                <p id="txt_aboutUs">
                    Estamos aqui para ajuda-lo  a encontrar a receita ideal para o seu dia a dia. <br>
                    Para além de puder escolher a receita que deseja também puderá criar e partilhar com outros utilizadores. <br>
                    Tudo á distância de apenas um click.
                </p>
            </div>
        </div>
        </div>
       
        </div>
<?php include("includes/footer.html");?>
  </body>
</html>


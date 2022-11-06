<?php
include 'db.php';
session_start();
?>
<html>
<head>
  <meta charset="UTF-8">
  <script src="//code.jquery.com/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="assets\css\destaques.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script> 
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/js/splide.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/css/splide.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    <title>Destaques</title>
</head>

<body>
    <?php include("includes/navsU.php");
?>
    <div class="dbreadcrumb" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Início</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="#">Destaques</a></li>
        </ol>
    </div>
 
    
    <?php
  ?>
<div class="destaquest">
<h1>Destaques da Semana</h1>   
</div>
<div id="splide" class="splide">
	<div class="splide__track" >
    <div class='splide__list'>
    <?php 
$resultades = mysqli_query($conn, "SELECT receitas.nome, receitas.id_receita, receitas.imagem, receitas.descricao,
receitas.duracao, receitas.dificuldade, receitas.npessoas, categorias.nome AS 'catnome'
FROM receitas
INNER JOIN categorias
ON receitas.id_categoria = categorias.id_categoria WHERE receitas.criado > DATE_SUB(NOW(), INTERVAL 2 WEEK) ORDER BY classificacao DESC LIMIT 4");
                     foreach($resultades as $rowdes) {
                        $id = $rowdes['id_receita'];
                        $imagem = $rowdes['imagem'];
                        $nome = $rowdes['nome'];  
                        $descricao = $rowdes['descricao'];  
                        $categoria = $rowdes['catnome'];  
                        $duracao = $rowdes['duracao'];    
                        $dificuldade = $rowdes['dificuldade']; 
                        $npessoas = $rowdes['npessoas']; 
                         echo "
		
            <div class='splide__slide'>
                <div class='destimagem'>
                    <img src='assets/img/receitas/$imagem' alt=''>
                </div>
                <div class='desttexto'>
                <input type='hidden' name='rcid' id='rid' value='".$id."'>
                    <div class='desttitulo'>
                    <p>$nome</p>
                    </div>
                    <div class='destdesc'>
                        $descricao                    
                    </div>
                    <div class='destdet1'>
                        <div class='destcat'>
                            <i id='cati' class='fa fa-list-alt'></i>$categoria
                        </div>
                        <div class='destnpes'>
                            <i id='npes' class='fas fa-user-friends'></i>$npessoas Pessoas
                        </div>
                    </div>
                    <div class='destdet1'>
                        <div class='desttempo'>
                            <i id='tempo' class='fas fa-stopwatch'></i>$duracao Minutos
                            </div>
                            <div class='destdef'>
                            <i id='def' class='fas fa-exclamation'></i>$dificuldade
                            </div>
                        </div>
                    </div>
                </div>
                    ";}?>
                 </div>
    </div>
</div>
</div>    


<h1 class="titu">Adicionadas Recentemente <span class="verrec"><a href="receitas.php" >Ver todas </a></span></h1>
<hr class="hr1">
<div class="wrapper">
  <section id="radds1">
  <a href="#radds2" style="display: none" class="arrow__btn">‹</a>
  <?php 
$resultar = mysqli_query($conn, "SELECT * FROM receitas ORDER BY criado DESC LIMIT 5");
                     foreach($resultar as $rowar) {
                        $id = $rowar['id_receita'];
                        $imagem = $rowar['imagem'];
                        $nome = $rowar['nome'];    
                         echo "
                         <div class='item'>
                         <img src='assets/img/receitas/$imagem'/> 
                         <input type='hidden' name='rcid' id='rid' value='".$id."'> 
                         <h4>$nome</h4>
                       </div>
  ";}?>
    <a href="#radds2" class="arrow__btn">›</a>
  </section>
  <section id="radds2">
    <a href="#radds1" class="arrow__btn">‹</a>
    <?php 
$resultar = mysqli_query($conn, "SELECT * FROM receitas ORDER BY criado DESC LIMIT 5 OFFSET 5");
                     foreach($resultar as $rowar) {
                        $id = $rowar['id_receita'];
                        $imagem = $rowar['imagem'];
                        $nome = $rowar['nome'];    
                         echo "
                         <div class='item'>
                         <input type='hidden' name='rcid' id='rid' value='".$id."'> 
                         <img src='assets/img/receitas/$imagem'/>  
                         <h4>$nome</h4>
                       </div>
  ";}?>
  </section>

</div>

<div class="mctit">
<h1 class="titu">Melhor Classificadas <span class="verrec"><a href="receitas.php" >Ver todas </a></span></h1>
</div>
<hr class="hr1">
<div class="wrapper">
  <section id="mclass1">
  <a href="#mclass2" style="display: none" class="arrow__btn">‹</a>
  <?php 
$resultmc = mysqli_query($conn, "SELECT * FROM receitas ORDER BY classificacao DESC LIMIT 5");
                     foreach($resultmc as $rowmc) {
                        $id = $rowmc['id_receita'];
                        $imagem = $rowmc['imagem'];
                        $nome = $rowmc['nome'];    
                         echo "
                         <div class='item'>
                         <input type='hidden' name='rcid' id='rid' value='".$id."'> 
                         <img src='assets/img/receitas/$imagem'/>  
                         <h4>$nome</h4>
                       </div>
  ";}?>
    <a href="#mclass2" class="arrow__btn">›</a>
  </section>
  <section id="mclass2">
    <a href="#mclass1" class="arrow__btn">‹</a>
    <?php 
$resultmc = mysqli_query($conn, "SELECT * FROM receitas ORDER BY classificacao DESC LIMIT 5 OFFSET 5");
                     foreach($resultmc as $rowmc) {
                        $id = $rowmc['id_receita'];
                        $imagem = $rowmc['imagem'];
                        $nome = $rowmc['nome'];    
                         echo "
                         <div class='item'>
                         <input type='hidden' name='rcid' id='rid' value='".$id."'> 
                         <img src='assets/img/receitas/$imagem'/>  
                         <h4>$nome</h4>
                       </div>
  ";}?>
  </section>

</div>

<div class="mctit">
<h1 class="titu">Mais Votadas <span class="verrec"><a href="receitas.php" >Ver todas </a></span></h1>
</div>
<hr class="hr1">
<div class="wrapper">
  <section id="mvot1">
  <a href="#mvot2" style="display: none" class="arrow__btn">‹</a>
  <?php 
$resultmv = mysqli_query($conn, "SELECT * FROM receitas ORDER BY nclassificacoes DESC LIMIT 5");
                     foreach($resultmv as $rowmv) {
                        $id = $rowmv['id_receita'];
                        $imagem = $rowmv['imagem'];
                        $nome = $rowmv['nome'];    
                         echo "
                         <div class='item'>
                         <input type='hidden' name='rcid' id='rid' value='".$id."'> 
                         <img src='assets/img/receitas/$imagem'/> 
                         <h4>$nome</h4> 
                       </div>
  ";}?>
    <a href="#mvot2" class="arrow__btn">›</a>
  </section>
  <section id="mvot2">
    <a href="#mvot1" class="arrow__btn">‹</a>
    <?php 
$resultmv = mysqli_query($conn, "SELECT * FROM receitas ORDER BY nclassificacoes DESC LIMIT 5 OFFSET 5");
                     foreach($resultmv as $rowmv) {
                        $id = $rowmv['id_receita'];
                        $imagem = $rowmv['imagem'];
                        $nome = $rowmv['nome'];    
                         echo "
                         <div class='item'>
                         <input type='hidden' name='rcid' id='rid' value='".$id."'> 
                         <img src='assets/img/receitas/$imagem'/>  
                         <h4>$nome</h4>
                       </div>
  ";}?>
  </section>
<p></p>
</div>


<div class="mctit">
<h1 class="titu">Categorias de Receitas</h1>
</div>
<hr class="hr1">
<div class="categorias">
<?php 
$resulcat = mysqli_query($conn, "SELECT * FROM categorias ORDER BY nome ASC");
foreach($resulcat as $rowcat) {
    $id = $rowcat['id_categoria'];
    $imagem = $rowcat['imagem'];
    $nome = $rowcat['nome'];    
     echo "
  <div class='catcard'>
    <h3 class='cattitle'>$nome</h3>
    <input type='hidden' name='categoria' id='rid' value='".$id."'>
    <img src='../admin/img/categorias/$imagem'/>  
    <input type='hidden' name='categorianome' id='rnome' value='".$nome."'>
  </div>
  ";}?>

  
</div>
<?php include("includes/footer.html");
?>
</body>


</body>
<script>

  $('.catcard').click(function() {
    var rnome = $(this).find("#rnome").val();
    var rid = $(this).find("#rid").val();
    rnome = rnome.toLowerCase();
    rnome = rnome.normalize("NFD").replace(/[\u0300-\u036f]/g, "")
    window.location.href = "receitas_" + rnome + ".php";
});


new Splide( '#splide', {
    type   : 'loop',
    autoplay: 'true',
    delay: 100,
} ).mount();
</script>
<script>
    $('.splide__slide').click(function() {
    var rid = $(this).find("#rid").val();
    window.location.href = "receita.php?receita=" + rid;
});

</script>
<script>
    $('.item').click(function() {
    var rid = $(this).find("#rid").val();
    window.location.href = "receita.php?receita=" + rid;
});

</script>

</html>


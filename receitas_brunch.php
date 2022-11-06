<?php
include 'db.php';
session_start();
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0" />
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/receitas.css">
    <script src="//code.jquery.com/jquery.min.js"></script>


    <title>CN'S | Brunch</title>
</head>

<body>
<?php include("includes/navsU.php");
?>
 <div class="dbreadcrumb" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Início</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="#">Lista de Receitas</a></li>
        </ol>
    </div>
    
    <?php include("includes/categorias.php");?>
    <main class="cd-main-content">
        <div class="cd-tab-filter-wrapper">
            <div class="cd-tab-filter">
                <ul class="cd-filters">
                    <li class="placeholder">
                        <a data-type="all" href="#0">Todas</a>
                        <!-- selected option on mobile -->
                    </li>
                    <li class="filter"><a class="selected" id="orderclass" data-type="all">Classificação</a></li>
                    <li class="filter" ><a data-type="all" id="orderalfa">Alfabética</a></li>
                    <li class="filter" ><a data-type="all" id="orderrecentes">Recentes</a></li>
                </ul>
                <!-- cd-filters -->
            </div>
            <!-- cd-tab-filter -->
        </div>
        <!-- cd-tab-filter-wrapper -->

        <section class="cd-gallery">
            <ul>
            <?php 
            include("includes/ordenacao_brunch.php");          
                        foreach($resultrec as $rowrec) {
                            $id = $rowrec['id_receita'];
                            $imagem = $rowrec['imagem'];
                            $classificacao = $rowrec['classificacao'];
                            $classificacao = intval($classificacao);
                            $duracao = $rowrec['duracao'];   
                            $duracao = intval($duracao);
                            $nome = $rowrec['nome'];  
                            $npessoas = $rowrec['npessoas'];  
                            $categoria = $rowrec['catnome'];   
                            $dificulade = $rowrec['dificuldade']; 
                            if ($duracao<10){
                                $duracaof = "menos10m";
                            }else if (10 <= $duracao && $duracao<15){
                                $duracaof = "mais10menos15m";
                            }else if (15 <= $duracao && $duracao<20){
                                $duracaof = "mais15mmenos20m";
                            }else if (20<=$duracao && $duracao <25){
                                $duracaof = "mais20mmenos25m";
                            }else if (25<=$duracao && $duracao<30){
                                $duracaof = "mais25mmenos30m";
                            }else if (30<=$duracao && $duracao<=35){
                                $duracaof = "mais30mmenos35m";
                            }else if (35<$duracao){
                                $duracaof = "mais35m";
                            }
                            echo" 
                            <li class='mix ".$categoria." ".$classificacao."c ".$duracaof." ".$dificulade." ".$npessoas."p'>
                            <div class='imgrec'>
                            <img src='assets/img/receitas/$imagem' alt='$nome'>
                            <div class='info'>
                                <p class='titulo'>".$nome."</p>
                                <input type='hidden' name='rcid' id='rid' value='".$id."'>
                                <p class='categoria'>".$categoria."</p>
                                <p class='class'>";  for ($i = 0; $i < $classificacao; $i++) { echo"<i class='fa fa-star' aria-hidden='true'></i>"; } echo"</p>
                            </div>
                            </div>
                        </li>
                            ";}?>
            </ul>
            <div class="cd-fail-message">Sem resultados encontrados</div>
        </section>
        <!-- cd-gallery -->

        <div  class="cd-filter" id="cd-filter">
            <form>
                <div class="cd-filter-block">
                    <h4>Pesquisar</h4>

                    <div class="cd-filter-content">
                        <input type="search" id="pesquisa" placeholder="">
                    </div>
                </div>



                <div class="cd-filter-block">
                    <h4>Nº de Pessoas</h4>

                    <ul class="cd-filter-content cd-filters list">
                    <?php 
                     $npessoasq = mysqli_query($conn, "SELECT DISTINCT npessoas FROM receitas ORDER BY npessoas");
                     foreach($npessoasq as $rownp) {
                        $npessoas = $rownp['npessoas'];        
                        echo "
                        <li>
                            <input class='filter' data-filter='.".$npessoas."p' type='checkbox' id='".$npessoas."'>
                            <label class='checkbox-label' for='".$npessoas."'>".$npessoas."</label>
                        </li>
                        ";}?>
                        
                    </ul>
                    <!-- cd-filter-content -->
                </div>

                <div class="cd-filter-block">
                    <h4>Dificuldade</h4>

                    <ul class="cd-filter-content cd-filters list">
                        <li>
                            <input class="filter" data-filter=".Fácil" type="checkbox" id="facil">
                            <label class="checkbox-label" for="facil">Fácil</label>
                        </li>

                        <li>
                            <input class="filter" data-filter=".Média" type="checkbox" id="media">
                            <label class="checkbox-label" for="media">Média</label>
                        </li>

                        <li>
                            <input class="filter" data-filter=".Dificíl" type="checkbox" id="dificil">
                            <label class="checkbox-label" for="dificil">Dificíl</label>
                        </li>
                    </ul>
                </div>

                <div class="cd-filter-block">
                    <h4>Duração</h4>

                    <ul class="cd-filter-content cd-filters list">
                    <li>
                            <input class="filter" data-filter=".menos10m" type="checkbox" id="menos10m">
                            <label class="checkbox-label" for="menos10m"> Até 10m</label>
                        </li>
                        <li>
                            <input class="filter" data-filter=".mais10menos15m" type="checkbox" id="mais10menos15m">
                            <label class="checkbox-label" for="mais10menos15m"> Entre 10m e 15m</label>
                        </li>

                        <li>
                            <input class="filter" data-filter=".mais15mmenos20m" type="checkbox" id="mais15mmenos20m">
                            <label class="checkbox-label" for="mais15mmenos20m"> Entre 15m e 20m</label>
                        </li>

                        <li>
                            <input class="filter" data-filter=".mais20mmenos25m" type="checkbox" id="mais20mmenos25m">
                            <label class="checkbox-label" for="mais20mmenos25m"> Entre 20m e 25m</label>
                        </li>
                        <li>
                            <input class="filter" data-filter=".mais25mmenos30m" type="checkbox" id="mais25mmenos30m">
                            <label class="checkbox-label" for="mais25mmenos30m"> Entre 25m e 30m</label>
                        </li>
                        <li>
                            <input class="filter" data-filter=".mais30mmenos35m" type="checkbox" id="mais30mmenos35m">
                            <label class="checkbox-label" for="mais30mmenos35m"> Entre 30m e 35m</label>
                        </li>
                        <li>
                            <input class="filter" data-filter=".mais35m" type="checkbox" id="mais35m">
                            <label class="checkbox-label" for="mais35m"> Acima de 35m</label>
                        </li>
                    </ul>
                </div>

                <div class="cd-filter-block">
                    <h4>Classificação</h4>

                    <ul class="cd-filter-content cd-filters list">
                    <?php 
                     $result = mysqli_query($conn, "SELECT DISTINCT classificacao FROM receitas ORDER BY classificacao ASC");
                     foreach($result as $row) {
                        $classificacao = $row['classificacao']; 
                        $classificacao = intval($classificacao);       
                        echo "
                        <li>
                            <input class='filter' data-filter='.".$classificacao."c' type='checkbox' id='".$classificacao."c'>
                            <label class='checkbox-label' for='".$classificacao."c'>";  for ($i = 0; $i < $classificacao; $i++) { echo"<i class='fa fa-star' aria-hidden='true'></i>"; } echo"</label>
                        </li>
                        ";}?>
                        
                    </ul>
                </div>
            </form>
            <a href="#0" class="cd-close"><i class="fa fa-times" aria-hidden="true"></i></a>
        </div>
        <a href="#0" class="cd-filter-trigger"> Filtros</a>
    </main>
    <script src="assets/js/jquery.mixitup.min.js"></script>
    <script src="assets/js/receitas.js"></script>
    <script src="assets/js/brunch.js"></script>
    <?php include("includes/footer.html");
?>
<script>
    $('.mix').click(function() {
    var rid = $(this).find("#rid").val();
    window.location.href = "receita.php?receita=" + rid;
});

</script>
</body>

</html>
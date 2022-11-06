<?php
include 'db.php';
if (isset($_SERVER['HTTP_REFERER'])){
    $pagina= $_SERVER['HTTP_REFERER'];
    $url = $pagina;
    $url = strtok($url, "?");
    }
    if (isset($_GET["receita"])){
        $receita = $_GET["receita"];
      }
      $receita = intval($receita);  
      $query1 = mysqli_query($conn, "SELECT receitas.id_receita, receitas.nome, receitas.total_classificacao, receitas.nclassificacoes, receitas.imagem, receitas.descricao, receitas.duracao, receitas.ingredientes_desc, receitas.id_ingredientes, 
      receitas.passos, receitas.npessoas, receitas.classificacao, receitas.dificuldade, receitas.criado, categorias.nome AS 'catnome', utilizadores.nome AS 'usernome',  utilizadores.imagem AS 'user_img', 
      utilizadores.apelido AS 'userapelido', utilizadores.criado AS 'usercriado' FROM receitas INNER JOIN utilizadores ON receitas.id_user = utilizadores.id_user INNER JOIN 
      categorias ON receitas.id_categoria = categorias.id_categoria WHERE receitas.id_receita = $receita");
      foreach ($query1 as $row) {
        $id = $row['id_receita'];
        $nome = $row['nome'];
        $imagem = $row['imagem'];  
        $user_img = $row['user_img'];    
        $descricao = $row['descricao'];  
        $duracao = $row['duracao'];  
        $ingredientes = $row['ingredientes_desc'];  
        $id_ingredientes = $row['id_ingredientes'];  
        $passos = $row['passos'];  
        $npessoas = $row['npessoas'];  
        $classificacao = $row['classificacao'];  
        $nclassificacoes = $row['nclassificacoes'];  
        $total_classificacao = $row['total_classificacao'];  
        $dificuldade = $row['dificuldade'];
        $criado = $row['criado'];  
        $catnome = $row['catnome'];  
        $usernome = $row['usernome'];  
        $userapelido = $row['userapelido'];     
        $usercriado = $row['usercriado'];  
        $usercriado = date('Y', strtotime($usercriado));
        }
        session_start();
        if (!(isset($_SESSION['id']))) {
            echo '<input type="hidden" value="nao_logado" id="login">';
        }else{
            $user_id_se = $_SESSION['id'];
            $query0 = mysqli_query($conn, "SELECT utilizadores.verificacao FROM utilizadores WHERE id_user = '$user_id_se'");
            foreach($query0 as $row) {
                $vericacao = $row['verificacao'];
            }
            if ($vericacao == "Não") {
                echo '<input type="hidden" value="nao_verificado" id="vericacao">';
            }
            $queryjaclass = mysqli_query($conn, "SELECT * FROM classificacoes WHERE id_receita = '$receita' && id_user = '$user_id_se'");
            if(mysqli_num_rows($queryjaclass)) {
                foreach($queryjaclass as $rowclass) {
                    $class_jaclass = $rowclass['classificacao'];
                }
                echo '<input type="hidden" value="ja_classificado" id="jaclass">';
                echo '<input type="hidden" value="'.$class_jaclass.'" id="class_jaclass">';
            }else{
                echo '<input type="hidden" value="0" id="class_jaclass">';
            }
            $queryjafav = mysqli_query($conn, "SELECT * FROM favoritos WHERE id_receita = '$receita' && id_user = '$user_id_se'");
            if(mysqli_num_rows($queryjafav)) {
                echo '<input type="hidden" value="ja_favorito" id="jafav">';
            }else{
                echo '<input type="hidden" value="0" id="jafav">';
            }
        }
        ?>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="assets/css/receita.css">
    <link rel="stylesheet" href="assets/css/toastr.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
    <title><?php echo $nome;?></title>
</head>

<body>
    
<?php include("includes/navsU.php"); ?>
 <div class="dbreadcrumb" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="receitas.php">Início</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="" onclick="location.reload();"><?php echo $nome?></a></li>
        </ol>
    </div>

    <div class="content">
        <p class="nome"><?php echo $nome?></p>
        <div class="op">
            <ul class="infos">
                <li class="tempo"><span class="icon"><i class='fas fa-stopwatch' aria-hidden="true"></i></span><br>
                <?php echo $duracao;?> Minutos</a></li>
                <li class="pessoas"><span class="icon"><i class='fas fa-user-friends' aria-hidden="true"></i></span><br>
                <?php echo $npessoas;?> Pessoas</a></li>
                <li class="categoria"><span class="icon"><i class='fa fa-list-alt' aria-hidden="true"></i></span><br>
                <?php echo $catnome;?> </a></li>
                <li class="dificuldade"><span class="icon"><i class='fas fa-exclamation' aria-hidden="true"></i></span><br>
                <?php echo $dificuldade;?></a></li>
            </ul>
        </div>
        <p class="descricao">Descrição</p>
        <hr class="hrdesc">
        <div class="descricao">
            <p><?php echo $descricao?></p>
            <div class="autor">
            <img src="/admin/img/users/<?php echo $user_img?>" alt="<?php echo $nome?>">
            <div class="nomes"> 
                <span class="nome"><?php echo $usernome?> <?php echo $userapelido?> </span>
                <p class="criado">Membro desde: <?php echo $usercriado?></p>
            </div>
        </div>
        </div>
        
        <div class="imagem">
            <img src="/assets/img/receitas/<?php echo $imagem?>" alt="<?php echo $nome?>">
        </div>
        <p class="ingredientes">Ingredientes</p>
        <hr class="hring">
        <div class="ingredientes">
        <ul id="c"> 
		<?php
            $id_ingredientes = explode(',', $id_ingredientes);
            foreach($id_ingredientes as $ingre){
                $ingre = intval($ingre);  
                $query2 = mysqli_query($conn, "SELECT * FROM ingredientes WHERE ingredientes.id_ingrediente = '$ingre'");
                foreach($query2 as $row2) {
                    $ingrediente_id = $row2['id_ingrediente'];
                    $ingrediente_nome = $row2['nome'];
                    $ingrediente_imagem = $row2['imagem'];      
                    echo "
                    <li><p><img src='admin/img/ingredientes/$ingrediente_imagem' alt='$ingrediente_nome'></p><p>$ingrediente_nome</p></li>
                    ";
                }     
            }
           ?>
	    </ul>
        </div>
        
        <p class="detingre">Detalhes</p>
        <hr class="hrdet">
        <div class="ingredesc">
            <?php
            $ingredientes = explode(',', $ingredientes);
            echo " <div class='ingrep'>";
            foreach($ingredientes as $ingres){
                echo "
                <p class='ingres'><img src='assets/img/circulo.png' alt=''> ", $ingres , "</p>
                ";
            } 
           ?>
           </div>
           </div>
        <p class="passos">Preparação</p>
        <hr class="hrpassos">
        <div class="passosdesc">
        
        <?php
            $passos = explode(',', $passos);
            echo " <div class='pre'>";
            foreach($passos as $passo){   
                echo "
                <p class='pre'><input type='checkbox' id='$passo' name='ps' value='ps'>
                <label for='$passo' class='passossp' data-content='$passo'>$passo</label></p>
                ";
            } 
            ?>
        </div>
        </div>
        <p class="feedback">Feedback</p>
        <hr class="feedback">
        <div class="opcoes">
            <div class="divclass"> 
                <p>Classificar</p>
                <img class="class" id="class" src="assets/img/classificar.png" alt="Classificar Receita">
            </div>
            <div class="divfav"> 
                <p>Favoritos</p>
                <img id="favs" class="fav" src="assets/img/favoritos.png" alt="Adicionar Receita aos Favoritos">
            </div>
            <div class="divrep"> 
                <p>Reportar</p>
                <img class="rep" id="reps" src="assets/img/reportar.png" alt="Reportar Receita">
            </div>
        </div>
    </div>


    <div class="modal fade" id="classificar">
        <div class="modal-dialog" role="dialog">
            <form method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Classificação</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="card-body text-center">
                        <?php echo" <img class='classimg' src='/assets/img/receitas/$imagem'>";?>
                    </div>
                    <input name="classvalor" id="classvalor" type="hidden">
                    <input name="rid" id="rid" value="<?php echo $id ?>" type="hidden">
                    <h4 class="classtit">Classifique a receita:</h4> 
                    <div class="classificacao" id="rateYo"></div>     
                    <p class="class"></p>
                        <button type="submit" id="classbtn" name="classbtn" class="classbtn">Classificar</button>
                </div>
            </div>
            </form>
        </div>
    </div>

    <div id="favoritos" class="modal fade">
        <div class="modal-dialog modal-confirm">
            <form method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tem a certeza que pretende adicionar <strong>"<?php echo $nome ?>"</strong> à sua lista de favoritos?</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <input name="favuser" id="favuser" value="<?php echo $user_id_se?>" type="hidden">
                <input name="favreceita" id="favreceita" value="<?php echo $id ?>" type="hidden">
                <input name="rid" id="rid" value="<?php echo $id ?>" type="hidden">
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal">Cancelar</button>
                    <button type="submit" id="favbtn" name="favbtn" class="btn btn-success">Adicionar</button>
                </div>
            </div>
            </form>
        </div>
    </div>
    <div id="favoritosremover" class="modal fade">
        <div class="modal-dialog modal-confirm">
            <form method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tem a certeza que pretende remover <strong>"<?php echo $nome ?>"</strong> da sua lista de favoritos?</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <input name="favuserrem" id="favuserrem" value="<?php echo $user_id_se?>" type="hidden">
                <input name="favreceitarem" id="favreceitarem" value="<?php echo $id ?>" type="hidden">
                <input name="rid" id="rid" value="<?php echo $id ?>" type="hidden">
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal">Cancelar</button>
                    <button type="submit" id="favrembtn" name="favrembtn" class="btn btn-danger">Remover</button>
                </div>
            </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="reportar">
                <div class="modal-dialog" role="dialog">
                    <form autocomplete="off" method="post">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Reportar <strong>"<?php echo $nome ?>"</strong></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input name="rep_motivo" class="rep_motivo" type="text" id="rep_motivo" required>
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label class="lb">Motivo:</label>
                                    </div>
                                    <br>
                                    <div class="input-group">
                                    <textarea rows="4" cols="50" class="rep_desc" id="rep_desc" name="rep_desc" required></textarea>
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label class="lb">Descrição:</label>
                                    </div> 
                                </div>
                            </div>
                            <input name="userrep" id="userrep" value="<?php echo $user_id_se?>" type="hidden">
                            <input name="receitarep" id="receitarep" value="<?php echo $id ?>" type="hidden">
                            <input name="rid" id="rid" value="<?php echo $id ?>" type="hidden">
                            <div class="modal-footer">
                                <button type="button" class="btn btn-info" data-dismiss="modal"></span>Cancelar</button>
                                <button type="submit" name="repbtn" id="repbtn" class="btn btn-danger">Reportar</button>
                            </div>
                        </div>
                </div>
                </form>
            </div>
        
        <?php
        if (isset($_POST['classbtn'])) {
            $classvalor = $_POST['classvalor'];
            $total_classificacao = $total_classificacao + $classvalor;
            $nclassificacoes = $nclassificacoes + 1;
            $classificacao = $total_classificacao / $nclassificacoes;
            $total_classificacao = round($total_classificacao, 1);
            $updatereceita = "UPDATE receitas SET total_classificacao=$total_classificacao, nclassificacoes=$nclassificacoes, classificacao=$classificacao
             WHERE id_receita=$id";   
             $updateclass = "INSERT INTO classificacoes(id_receita, id_user, classificacao) 
             VALUES ($id, $user_id_se, $classvalor)";
             if ($conn->query($updateclass) === true && $conn->query($updatereceita) === true) {
                echo '<script>
                var rid =document.getElementById("rid").value;
                window.location.href = "receita.php?receita=" + rid;</script>';
            }
            
        }
        if (isset($_POST['favbtn'])) {
            $favuser = $_POST['favuser'];
            $favreceita = $_POST['favreceita'];
             $updatefav = "INSERT INTO favoritos(id_receita, id_user) VALUES ($favreceita, $favuser)";
             if ($conn->query($updatefav) === true) {
                echo '<script>
                var rid =document.getElementById("rid").value;
                window.location.href = "receita.php?receita=" + rid;</script>';
            }
            
        }
        if (isset($_POST['favrembtn'])) {
            $favuserrem = $_POST['favuserrem'];
            $favreceitarem = $_POST['favreceitarem'];
             $removerfav = "DELETE FROM favoritos WHERE id_receita=$favreceitarem && id_user=$favuserrem";
             if ($conn->query($removerfav) === true) {
                echo '<script>
                var rid =document.getElementById("rid").value;
                window.location.href = "receita.php?receita=" + rid;</script>';
            }
            
        }
        if (isset($_POST['repbtn'])) {
            $userrep = $_POST['userrep'];
            $receitarep = $_POST['receitarep'];
            $rep_motivo = $_POST['rep_motivo'];
            $rep_desc = htmlspecialchars($_POST['rep_desc']);
             $queryrep = "INSERT INTO reports(id_user, id_receita, motivo, descricao) VALUES ($userrep, $receitarep , '$rep_motivo' , '$rep_desc')";
             if ($conn->query($queryrep) === true) {
                echo '<script>
                var rid =document.getElementById("rid").value;
                window.location.href = "receita.php?receita=" + rid;</script>';
            }
            
        }
        ?>
    <?php include("includes/footer.html");?>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    <script src="//code.jquery.com/jquery.min.js"></script>
    <script src="assets/js/toastr.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" 
    crossorigin="anonymous"></script>
    <script src="/assets/js/receita.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
    <script>
    $(function () {
        var class_jaclass = $('#class_jaclass').val();
        class_jaclass = parseFloat(class_jaclass);
        if(class_jaclass !=0){
        $("#rateYo").rateYo({
            rating : class_jaclass,
            readOnly: true,
            spacing   : "5px",
            multiColor: {
                "startColor": "#FF0000", //vermelho
                "endColor"  : "#32CD32"  //verde
            }
        });
            $(".class").text(class_jaclass + " Estrelas");
            $("#classbtn").css("display", "none");
        }else{
        $("#rateYo").rateYo({
            spacing   : "5px",
            multiColor: {
                "startColor": "#FF0000", //vermelho
                "endColor"  : "#32CD32"  //verde
            }
        });
        }
        $("#rateYo").rateYo().on("rateyo.change", function (e, data) {
            var rating = data.rating;
            $(".class").text(rating + " Estrelas");
                rating = parseFloat(rating);
                $("#classvalor").val(rating);
            });
    });
            
        if ($('#login').val() == "nao_logado"){
            $("#class").click(function(){
                toastr.error("Precisa de fazer Login para classificar receitas!","Erro!");
            });  
            $("#favs").click(function(){
                toastr.error("Precisa de fazer Login para adicionar a receita aos favoritos!","Erro!");
            }); 
            $("#reps").click(function(){
                toastr.error("Precisa de fazer Login para reportar uma receita!","Erro!");
            });  
        }else{
            if ($('#jafav').val() == "ja_favorito"){
                $("#favs").attr("src","assets/img/favorito2.png");
                $("#favs").click(function(){
                        $('#favoritosremover').modal('show');
                    }); 
                }else{
                    $("#favs").click(function(){
                        $('#favoritos').modal('show');
                    }); 
                }
            if ($('#vericacao').val() == "nao_verificado"){
                $("#class").click(function(){
                    toastr.error("A sua conta precisa de estar verificada para classificar receitas!","Erro!");
                });  
                $("#reps").click(function(){
                    toastr.error("A sua conta precisa de estar verificada para reportar uma receita!","Erro!");
                });  
            }else {
            if ($('#jaclass').val() == "ja_classificado"){
                $("#class").attr("src","assets/img/classificado.png");
                $("#class").click(function(){
                    $('#classificar').modal('show');
                    $(".classtit").text("Já classificou esta receita!");
                    $(function () {
                        $("#rateYo").rateYo({
                            rating : 2,
                            spacing   : "5px",
                        });
                    });
                    });
            }else{
                $("#class").click(function(){
                    $('#classificar').modal('show');
                });
            }
            $("#reps").click(function(){
                $('#reportar').modal('show');
            });
            }
        }
    </script>
</body>
</html>
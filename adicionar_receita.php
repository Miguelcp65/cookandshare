<?php
include 'db.php';
session_start();

?>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    
    <script src="//code.jquery.com/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/css/adicionar_receita.css">
    <link rel="stylesheet" href="../assets/css/toastr.css">
    <script src="../assets/js/toastr.js"></script>
    <title>CN'S | Adicionar Receita</title>
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
            <li class="breadcrumb-item"><a href="painel_receitas.php">Painel de Receitas</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="adicionar_receita.php">Adicionar Receita</a></li>
        </ol>
    </div>
    <div class="form">
      <p>Adicionar Receita</p>
      <form method="POST" autocomplete="off" action="includes\add_receita.inc.php" enctype="multipart/form-data">
        <input type="hidden" name="userid" value="<?php echo $user_id_se ?>">
      <div class="ipts">
    <div class="inpts1">
      <div class="form-group">
        <label for="nome">Nome:</label>
        <input type="text" placeholder="Nome da Receita" name="nome" class="form-control" id="nome" required>
      </div>
      <div class="form-group">
        <label for="desc">Descrição:</label>
        <input type="text" placeholder="Descrição da Receita" name="desc" class="form-control" id="desc" required>
      </div>
      <div class="form-group">
        <label for="passos">Passos:</label>
        <input type="text" placeholder="Ex: cortar as batatas, temperar a salada, etc..." name="passos" class="form-control" id="passos" required>
      </div>
      <div class="form-group">
        <label class="cat" for="cat">Categoria:</label>
        <br><br>
        <select class="form-control" id="catsel" name="categoria" required>
        <option></option>
        <?php
          $catq = mysqli_query($conn, "SELECT * FROM categorias ORDER BY nome ASC");
          foreach($catq as $rowcat) {
              $cat = $rowcat['nome']; 
              $catid = $rowcat['id_categoria']; 
              ?> 
            <option class="opcat" <?php if (isset($_POST["categoria"])) { if($_POST['categoria'] == $catid) { ?>selected="true" <?php }; }else{?> value = "<?php echo $catid; }?>">
              <?php echo $cat; ?> 
            </option>
            <?php } ?>
       </select>
       
      </div>
      <br>
      <div class="form-group">
      <label  for="dif">Dificuldade:</label>
      <br><br>
      <select class="form-control" id="dif" name="dif" required>
      <option></option>
        <option value="Fácil">Fácil</option>
        <option value="Média">Média</option>
        <option value="Difícil">Difícil</option>
       </select>
      </div>
      
      </div>
    <div class="inpts2">
      <div class="form-group">
        <label for="duracao">Duração:</label>
        <input type="text" placeholder="Defina a Duração" name="duracao" class="form-control" id="duracao" required>
      </div>
      
      <div class="form-group">
        <label for="descing">Descrição dos Ingredientes:</label>
        <input type="text" placeholder="Ex: 2 colheres de açucar, Meia dúzia de ovos, etc..." name="descing" class="form-control" id="descing" required>
      </div>
      <div class="form-group">
        <label for="npessoas">Numero de Pessoas:</label>
        <input type="text" placeholder="Indique o Numero de Pessoas" class="form-control" name="npessoas"  id="npessoas" required>
      </div>
      <div class="form-group">
        <label for="privacidade">Privacidade:</label>
        <br><br>
      <select class="form-control" id="privacidade" name="privacidade" required>
      <option></option>
        <option value="Público">Público</option>
        <option value="Privado">Privado</option>
       </select>
      </div>
      <div class="form-group">
      <label class="ing" for="ing">Ingredientes:</label>
        <br><br>
        <select class="ingsel" name="ingres[]" multiple="multiple" required>
        <option></option>
        <?php
          $catq = mysqli_query($conn, "SELECT * FROM ingredientes ORDER BY nome ASC");
          foreach($catq as $rowcat) {
              $ing = $rowcat['nome']; 
              ?> 
            <option class="oping" <?php if (isset($_POST["categoria"])) { if($_POST['categoria'] == $ing) { ?>selected="true" <?php }; }else{?> value = "<?php echo $ing; }?>">
              <?php echo $ing; ?> 
            </option>
            <?php } ?>
       </select>
      </div>
      <br>
      <label class="imagem" for="imagem">Imagem:</label>
      <div class="form-group">
        <input name="imagem" class="imagem" id="imagem" type="file"/>
      </div>
      </div>
      <input name="adddreceita" id="addreceita" value="Adicionar Receita" class="addreceita" type="submit">
    </div>
    </form>
    </div>
    <?php include("includes/footer.html");
?>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>
<script>
$(document).ready(function() {
    $(".ingsel").select2({
      "language": {
       "noResults": function(){
           return "Ingrediente não encontrado";
       }
   },
    placeholder: "Selecione os Ingredientes",
    dropdownAutoWidth : true,
    width: '100%'
});
});
$(document).ready(function() {
    $("#catsel").select2({
      "language": {
       "noResults": function(){
           return "Categoria não encontrada";
       }
   },
    placeholder: "Selecione a Categoria",
    dropdownAutoWidth : true,
    width: '100%',
    allowClear: true
});
});
$(document).ready(function() {
    $("#dif").select2({

    placeholder: "Selecione a Dificuldade",
    dropdownAutoWidth : true,
    width: '100%',
    allowClear: true
});
});
$(document).ready(function() {
    $("#privacidade").select2({

    placeholder: "Selecione a Privacidade",
    dropdownAutoWidth : true,
    width: '100%',
    allowClear: true
});
});
</script>
</html>
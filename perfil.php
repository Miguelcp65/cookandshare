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
    
    <script src="//code.jquery.com/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/css/perfil.css">
    <link rel="stylesheet" href="../assets/css/toastr.css">
    <script src="../assets/js/toastr.js"></script>
    <title>CN'S | Perfil</title>
</head>

<body>
<?php 
 
include("includes/navsU.php");
if (isset($_SESSION['id'])) {
  $user_id_se = $_SESSION['id'];
  $user_id_se = intval($user_id_se); 
  $queryuser = mysqli_query($conn, "SELECT * FROM utilizadores WHERE id_user=$user_id_se");
        foreach($queryuser as $row) {
            $imagem = $row['imagem'];
            $nome = $row['nome'];  
            $apelido = $row['apelido'];              
            $email = $row['email'];
            $nif = $row['nif'];
            $idade = $row['idade'];
            $sexo = $row['sexo'];
        }
    }
   
        if (isset($_GET["report"])){
            if ($_GET["report"] == "user-editado") {
              echo' <script>toastr.success("Perfil Editado com Sucesso","Sucesso!");</script>';
            }
        }  
    ?>

 <div class="dbreadcrumb" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="receitas.php">Início</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="perfil.php">Perfil</a></li>
        </ol>
    </div>
    <div class="form">
      <p>Perfil</p>
      <form method="POST" autocomplete="off" action="includes\edit_perfil.inc.php" enctype="multipart/form-data">
        <input type="hidden" name="userid" value="<?php echo $user_id_se ?>">
      <div class="ipts">
    <div class="inpts1">
      <div class="form-group">
        <label for="nome">Nome:</label>
        <input type="text" value="<?php echo isset($_POST["nome"]) ? $_POST["nome"] : $nome; ?>"
         name="nome" class="form-control" id="nome" required>
      </div>
      <div class="form-group">
        <label for="apelido">Apelido:</label>
        <input type="text"  value="<?php echo isset($_POST["apelido"]) ? $_POST["apelido"] : $apelido; ?>"
         name="apelido" class="form-control" id="apelido" required>
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input readonly type="email" value="<?php echo isset($_POST["email"]) ? $_POST["email"] : $email; ?>" name="email" class="form-control" id="email" required>
      </div>
      <div class="form-group">
        <label for="nif">NIF:</label>
        <input type="hidden" value="<?php echo $nif ?>" name="old_nif">
        <input type="number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==9) return false;"
         placeholder="Introduza o seu nif" value="<?php echo isset($_POST["nif"]) ? $_POST["nif"] : $nif; ?>" name="nif" class="form-control" id="nif" required>
      </div>

      <br>
      <div class="form-group">
      <label class="sexo" for="sexo">Sexo:</label>
      <br><br>
      <select class="form-control" id="sexo" name="sexo" >
        <option value="Masculino">Masculino</option>
        <option value="Feminino">Feminino</option>
        <option value="Não Revelar">Não Revelar</option>
       </select>
      </div>
      </div>
    <div class="inpts2">
      <div class="form-group">
        <label for="duracao">Idade:</label>
        <input type="number" placeholder="Introduza a sua idade" value="<?php echo isset($_POST["idade"]) ? $_POST["idade"] : $idade; ?>" name="idade" class="form-control" id="idade" required>
      </div>
      
      <div class="form-group">
        <label for="imagem">Fotografia:</label>
        
        <input type="file" name="imagem" class="form-control" id="imagem" >
        <img src="../admin/img/users/<?php echo $imagem?>" alt="">
      </div>
      </div>
      <input name="edit" id="edit" value="Editar Perfil" class="edit" type="submit">
    </div>
    </form>
    </div>
    <?php include("includes/footer.html");
?>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>
<script>
$(document).ready(function() {
    $("#sexo").select2({
      "language": {
       "noResults": function(){
           return "Sem resultados";
       }
   },
    placeholder: "Sexo",
    dropdownAutoWidth : true,
    width: '100%',
    allowClear: true
});
});

</script>
</html>
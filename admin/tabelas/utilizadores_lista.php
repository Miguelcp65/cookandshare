<?php
        include '../../db.php';
        include("../../includes/sessao_admin.php");
        ?>
<html>

<head>
    <meta charset="UTF-8">
    <title>Lista de Utilizadores</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0" />
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>
    <link href="https://cdn.datatables.net/select/1.3.1/css/select.dataTables.min.css" rel="stylesheet" type="text/css" />

    
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.0.3/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.0.3/js/buttons.print.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>


    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../../assets/css/utilizadores_lista.css">
    <script type="text/javascript" charset="utf8" src="../../assets/js/utilizadores_lista.js"></script>
    <link rel="stylesheet" href="../../assets/css/material.min.css">
    <script src="../../assets/js/material.min.js"></script>
    <link rel="stylesheet" href="../../assets/css/toastr.css">
    <script src="../../assets/js/toastr.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="//cdn.datatables.net/plug-ins/1.10.21/filtering/type-based/accent-neutralise.js"></script>
    

</head>

<body>
    
<?php
    if (isset($_SERVER['HTTP_REFERER'])){
    $pagina= $_SERVER['HTTP_REFERER'];
    $url = $pagina;
    $url = strtok($url, "?");
    }
    
    if (isset($_GET["report"])){
        if ($_GET["report"] == "user-adicionado") {
          echo' <script>toastr.success("Utilizador Adicionado com Sucesso","Sucesso!");</script>';
          echo("<script>history.replaceState({},'','$url');</script>");
        }else if ($_GET["report"] == "user-adicionado-sem-imagem") {
            echo' <script>toastr.success("Utilizador Adicionado com Sucesso","Sucesso!");</script>';
            echo' <script>toastr.warning("Não atribuiu nenhuma imagem ao utilizador","Atenção!");</script>';
            echo("<script>history.replaceState({},'','$url');</script>");
        }else if ($_GET["report"] == "user-nao-eliminado") {
            echo' <script>toastr.error("Não é possível eliminar um utilizador que tenha publicações ativas!","Erro!");</script>';
            echo("<script>history.replaceState({},'','$url');</script>");
       }else if ($_GET["report"] == "user-editado") {
            echo' <script>toastr.success("Utilizador Editado com Sucesso","Sucesso!");</script>';
            echo("<script>history.replaceState({},'','$url');</script>");
       }else if ($_GET["report"] == "users-eliminados") {
            echo' <script>toastr.success("Vários Utilizadores foram eliminados!","Sucesso!")</script>';
            echo("<script>history.replaceState({},'','$url');</script>");
       }else if ($_GET["report"] == "user-eliminado") {
            echo' <script>toastr.success("O Utilizador foi eliminado com sucesso!","Sucesso!")</script>';
            echo("<script>history.replaceState({},'','$url');</script>");
       }
      }
    
      include("../../includes/navsA.html");
?>
<script type="text/javascript">
    
</script>

<br>
<br>
   
    <div class="main-card mb-3 card">
        <div class="card-body">
            <div class="tabela">
                <h2 class="m-0 text-dark">Tabela de Utilizadores</h2>
            </div>
            <div class="table-responsive" >
                <table id="tabela" class="table table-striped table-bordered">
                    <thead>
                    <tr class='trh'>
                      <th>ID</th>
                      <th>Nome</th>
                      <th>Apelido</th>
                      <th>Imagem</th>
                      <th>Email</th>
                      <th>nif</th>
                      <th>Idade</th>
                      <th>Sexo</th>
                      <th>Nível</th>
                      <th>Verificação</th>
                      <th class='thcriado'>Criação</th>
                      <th class='theditado'>Edição</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                     $result = mysqli_query($conn, "SELECT * FROM utilizadores");
                     foreach($result as $row) {
                            $id = $row['id_user'];
                            $nome = $row['nome'];  
                            $apelido = $row['apelido'];  
                            $imagem = $row['imagem'];
                            $email = $row['email'];
                            $nif = $row['nif'];  
                            $idade = $row['idade'];  
                            $sexo = $row['sexo'];  
                            $nivel = $row['nivel']; 
                            $verificacao = $row['verificacao'];          
                            $criado = $row['criado'];
                            $editado = $row['editado'];
                            echo "<tr class='trv'>
                                <td class='tdid'>$id</td>
                                <td class='tdnome'>$nome</td>
                                <td class='tdapelido'>$apelido</td> ";
                                 if ($imagem != 'Sem Imagem') { 
                                  echo"
                                <td class='tdimagem'><img src='../img/users/$imagem' class='userim' alt='Imagem'/></td> ";
                                } else {
                                    echo" 
                                <td class='tdsemimagem'>SEM IMAGEM</td>
                                ";
                                }
                                echo"   
                                <td class='tdemail'>$email</td> 
                                <td class='tdnif'>$nif</td>
                                <td class='tdidade'>$idade</td>
                                <td class='tdsexo'>$sexo</td>
                                <td class='tdnivel'>$nivel</td>     
                                <td class='tdverificacao'>$verificacao</td>        
                                <td class='tdcriado'>$criado</td>
                                <td class='tdeditado'>$editado</td>
                                ";?>
            </div>
        


            <!--Adicionar Registo -->
            <div class="modal fade" id="addmodal">
                <div class="modal-dialog" role="dialog">
                    <form autocomplete="off" method="POST" enctype="multipart/form-data">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Adicionar Utilizador</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input name="add_nome" class="iptadd" type="text" value="<?php echo isset($_POST["add_nome"]) ? $_POST["add_nome"] : ''; ?>" required>
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label class="lb">Nome</label>
                                    </div>
                                    <div class="input-group">
                                        <input name="add_apelido" class="iptadd" type="text" value="<?php echo isset($_POST["add_apelido"]) ? $_POST["add_apelido"] : ''; ?>" required>
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label class="lb">Apelido</label>
                                    </div>
                                    <div class="input-group">
                                        <input name="add_email" class="iptadd" id="add_email" type="email" value="<?php echo isset($_POST["add_email"]) ? $_POST["add_email"] : ''; ?>" required>
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label class="lb">Email</label>
                                    </div>
                                    <div class="input-group">
                                        <input name="add_nif" class="iptadd" id="add_nif" minlength="9" maxlength="9" type="number" value="<?php echo isset($_POST["add_nif"]) ? $_POST["add_nif"] : ''; ?>" required>
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label class="lb">NIF</label>
                                    </div>
                                    <div class="input-group">
                                        <input name="add_idade" class="iptadd" type="number" value="<?php echo isset($_POST["add_idade"]) ? $_POST["add_idade"] : ''; ?>" required>
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label class="lb">Idade</label>
                                    </div>
                                    <div class="input-group">
                                    <select name="add_sexo" class="iptadd" required>
                                    <option value="">Sexo</option>
                                    <?php
                                    $qsexo = "SELECT DISTINCT sexo FROM utilizadores ORDER BY sexo ASC";
                                    $opsexo = mysqli_query($conn, $qsexo);
                                    while($row = mysqli_fetch_object($opsexo)){?>
                                        <option class="opsexo" <?php if (isset($_POST["add_sexo"])) { if($_POST['add_sexo'] == $row->sexo) { ?>selected="true" <?php }; }else{?> value = "<?php echo $row->sexo; }?>">
                                            <?php echo $row->sexo; ?>
                                        </option>
                                        <?php
                                    }
                                    ?>
                                    </select>
                                    </div>
                                    <div class="input-group">
                                    <select name="add_nivel" class="iptadd" required>
                                    <option value="">Nível</option>
                                    <?php
                                    $qnivel = "SELECT DISTINCT nivel FROM utilizadores ORDER BY nivel ASC";
                                    $opnivel= mysqli_query($conn, $qnivel);
                                    while($row2 = mysqli_fetch_object($opnivel)){?>
                                        <option class="opnivel" <?php if (isset($_POST["add_nivel"])) { if($_POST['add_nivel'] == $row2->nivel) { ?>selected="true" <?php }; }else{?> value = "<?php echo $row2->nivel; }?>">
                                            <?php echo $row2->nivel; ?>
                                        </option>
                                        <?php
                                    }
                                    ?>
                                    </select>
                                    </div>
                                    <div class="input-group">
                                        <input name="add_password" class="iptadd" minlength="8" type="password" value="<?php echo isset($_POST["add_password"]) ? $_POST["add_password"] : ''; ?>" required>
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label class="lb">Password</label>
                                    </div>
                                    <div class="input-group">
                                        <input name="new_imagem" class="imagem" type="file"  name="new_imagem"/>
                                        <label class="lb">Imagem</label>
                                    </div> 
                                </div>
                            </div>
                            <div class="modal-footer">
                            <?php 
                            if (!(isset($_POST['add']))) {
                                echo '<button type="reset" class="btn btn-warning">Limpar</button>';} ?>
                                <button type="button" class="btn btn-info" data-dismiss="modal">Cancelar</button>
                                <button type="submit" name="add" class="btn btn-success">Adicionar</button>
                            </div>
                        </div>
                </div>
                </form>
            </div>


            <!--Editar Registo -->
            <div class="modal fade" id="editmodal">
                <div class="modal-dialog" role="dialog">
                    <form autocomplete="off" method="post" enctype="multipart/form-data">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Editar Utilizador</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" value="<?php echo isset($_POST["update_id"]) ? $_POST["update_id"] : ''; ?>" name="update_id" name="update_id" name="update_id">
                                <input type="hidden" value="<?php echo isset($_POST["old_email"]) ? $_POST["old_email"] : ''; ?>" name="old_email" name="old_email">
                                <input type="hidden" value="<?php echo isset($_POST["old_nif"]) ? $_POST["old_nif"] : ''; ?>" name="old_nif">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input name="update_nome" class="iptedit" type="text" value="<?php echo isset($_POST["update_nome"]) ? $_POST["update_nome"] : ''; ?>" required>
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label class="lb">Nome</label>
                                    </div>
                                    <div class="input-group">
                                        <input name="update_apelido" class="iptedit" type="text" value="<?php echo isset($_POST["update_apelido"]) ? $_POST["update_apelido"] : ''; ?>" required>
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label class="lb">Apelido</label>
                                    </div>
                                    <div class="input-group">
                                        <input name="update_email" class="iptedit"  id="update_email" type="email" value="<?php echo isset($_POST["update_email"]) ? $_POST["update_email"] : ''; ?>" required>
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label class="lb">Email</label>
                                    </div>
                                    <div class="input-group">
                                        <input name="update_nif" class="iptedit" id="update_nif" type="text" value="<?php echo isset($_POST["update_nif"]) ? $_POST["update_nif"] : ''; ?>" required>
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label class="lb">NIF</label>
                                    </div>
                                    <div class="input-group">
                                        <input name="update_idade" class="iptedit" type="text" value="<?php echo isset($_POST["update_idade"]) ? $_POST["update_idade"] : ''; ?>" required>
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label class="lb">Idade</label>
                                    </div>
                                    <div class="input-group">
                                    <select name="update_sexo" class="iptedit" value="<?php echo isset($_POST["update_sexo"]) ? $_POST["update_sexo"] : ''; ?>" required>
                                    <option value="">Sexo</option>
                                    <?php
                                    $qsexo = "SELECT DISTINCT sexo FROM utilizadores ORDER BY sexo ASC";
                                    $opsexo = mysqli_query($conn, $qsexo);
                                    while($row = mysqli_fetch_object($opsexo)){?>
                                        <option class="opsexo" <?php if (isset($_POST["update_sexo"])) { if($_POST['update_sexo'] == $row->sexo) { ?>selected="true" <?php };}?> >
                                            <?php echo $row->sexo; ?>
                                        </option>
                                        <?php
                                    }
                                    ?>
                                    </select>
                                    </div>
                                    <div class="input-group">
                                    <select name="update_nivel" class="iptedit" required>
                                    <option value="">Nivel</option>
                                    <?php
                                    $qnivel = "SELECT DISTINCT nivel FROM utilizadores ORDER BY nivel ASC";
                                    $opnivel= mysqli_query($conn, $qnivel);
                                    while($row2 = mysqli_fetch_object($opnivel)){?>
                                        <option class="opnivel" <?php if (isset($_POST["update_nivel"])) { if($_POST['update_nivel'] == $row2->nivel) { ?>selected="true" <?php };}?>>
                                            <?php echo $row2->nivel; ?>
                                        </option>
                                        <?php
                                    }
                                    ?>
                                    </select>
                                    </div>
                                    <div class="input-group">
                                        <input name="update_imagem" class="ipteditimagem" type="file" name="imagem"/>
                                        <label class="lb">Imagem</label>
                                    </div> 
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-info" data-dismiss="modal"></span>
                                    Cancelar</button>
                                <button type="submit" name="update" class="btn btn-success">Guardar</button>
                            </div>
                        </div>
                </div>
                </form>
            </div>        
       

            <!--Eliminar Registo -->
            <div id="deletemodal" class="modal fade">
                <div class="modal-dialog modal-confirm">
                <form autocomplete="off" method="post" id="formeliminados">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h4 class="modal-title">Tem a certeza que pretende eliminar <strong class="titulodelete"></strong> utilizador(es)?</h4>
                                <button type="button" class="close" data-dismiss="modal"
                                    aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-body">
                                <p>O registo ficará eliminado permanemente.</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-info" data-dismiss="modal">Cancelar</button>
                                <button type="submit" name="delete" class="btn btn-danger">Eliminar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <?php
                }
          ?>
            </tbody>
            </table>
        </div>
    </div>
    </div>
    </div>
    </div>

    <?php
            if (isset($_POST['add'])) {
              $nome = $_POST['add_nome'];
              $apelido = $_POST['add_apelido'];
              $email = $_POST['add_email'];
              $nif = $_POST['add_nif'];
              $idade = $_POST['add_idade'];
              $sexo = $_POST['add_sexo'];
              $nivel = $_POST['add_nivel'];
              $password = $_POST['add_password'];
              $password = password_hash($password, PASSWORD_DEFAULT);
              $valemail = mysqli_query($conn, "SELECT email FROM utilizadores WHERE email = '$email'");
              if(mysqli_num_rows($valemail)) {
                    echo' <script>toastr.error("O Email já está a ser usado!","Erro!");</script>';  
                    echo "<script>
                    $(document).ready(function(){
                        $('#addmodal').modal('show');
                        $('#add_email').css('border', '1px solid red');
                    });             
                    </script>";      
                }else{
                    $valnif = mysqli_query($conn, "SELECT nif FROM utilizadores WHERE nif = '$nif'");
                    if(mysqli_num_rows($valnif)) {
                        echo' <script>toastr.error("O NIF já está a ser usado!","Erro!");</script>';  
                        echo "<script>
                            $(document).ready(function(){
                            $('#addmodal').modal('show');
                            $('#add_nif').css('border', '1px solid red');
                            });             
                            </script>";      
                    }else{
                            $sql = "INSERT INTO utilizadores (nome, apelido, email, nif, idade, sexo, nivel, password) VALUES ('$nome', '$apelido', '$email',
                            '$nif', '$idade', '$sexo', '$nivel', '$password')";
                            if ($conn->query($sql) === true) {
                                $id_img = mysqli_query($conn, "SELECT id_user FROM utilizadores WHERE email ='$email'");
                                foreach($id_img as $rows) {
                                    $img_id = $rows['id_user']; 
                                } 
                            if (!empty($_FILES['new_imagem']['name'])) {    
                                $ImageName = $_FILES['new_imagem']['name'];
                                $fileElementName = 'new_imagem';
                                $type=substr($ImageName,strrpos($ImageName,'.')+1);
                                $target_dir = "../img/users/";
                                $location = $target_dir . $img_id . '.' . $type; 
                                $new_imagem =  $img_id . '.' . $type; 
                                move_uploaded_file($_FILES['new_imagem']['tmp_name'], $location);
                                $sql2 = "UPDATE utilizadores SET imagem='$new_imagem' WHERE id_user='$img_id'";
                                if ($conn->query($sql2) === true) {
                                    echo '<script>window.location.href = "utilizadores_lista.php?report=user-adicionado";</script>';
                                }  
                            }else{
                                echo '<script>window.location.href = "utilizadores_lista.php?report=user-adicionado-sem-imagem";</script>';
                        }
                    
                }
            }
        }
    }
                ?>
    </div>
    </div>
    <?php

 if (isset($_POST['delete'])) {
    $registo_eliminar_id = $_POST['registo_eliminar_id'];
    $registo_eliminar_nome = $_POST['registo_eliminar_nome'];
    $registo_eliminar_apelido = $_POST['registo_eliminar_apelido'];
    $registo_eliminar_email = $_POST['registo_eliminar_email'];
    $registo_eliminar_nif = $_POST['registo_eliminar_nif'];
    $registo_eliminar_idade = $_POST['registo_eliminar_idade'];
    $registo_eliminar_sexo = $_POST['registo_eliminar_sexo'];
    $registo_eliminar_nivel = $_POST['registo_eliminar_nivel'];
    
    for ($i = 0; $i < count($registo_eliminar_id); $i++) {
        $delete_id = $registo_eliminar_id[$i];
        $delete_nome = $registo_eliminar_nome[$i];
        $delete_apelido = $registo_eliminar_apelido[$i];
        $delete_email = $registo_eliminar_email[$i];
        $delete_nif = $registo_eliminar_nif[$i];
        $delete_idade = $registo_eliminar_idade[$i];
        $delete_sexo = $registo_eliminar_sexo[$i];
        $delete_nivel = $registo_eliminar_nivel[$i];
        $img_delete = mysqli_query($conn, "SELECT imagem FROM utilizadores WHERE id_user = '$delete_id'");
                foreach($img_delete as $row) {
                   $img_del = $row['imagem'];  
                }
                if (!($img_del == 'Sem Imagem')){
                    unlink("../img/users/$img_del");
                   }
                $sql1 = "DELETE FROM reports WHERE id_user = '$delete_id'";
                $sql3 = "DELETE FROM classificacoes WHERE  id_user = '$delete_id'";
                $sql4 = "DELETE FROM favoritos WHERE id_user ='$delete_id'";
                $sql5 = "DELETE FROM receitas WHERE id_user ='$delete_id'";
                $sql2 = "DELETE FROM utilizadores WHERE id_user = '$delete_id'";  
                if ($conn->query($sql1) === true && $conn->query($sql2) === true && $conn->query($sql3) === true && $conn->query($sql4) === true && $conn->query($sql5) === true) {
                    if (1 < count($registo_eliminar_id)){
                        echo '<script>window.location.href = "utilizadores_lista.php?report=users-eliminados";</script>';
                    }else{
                        echo '<script>window.location.href = "utilizadores_lista.php?report=user-eliminado";</script>';
                    }
                }else{
                    echo '<script>window.location.href = "utilizadores_lista.php?report=user-eliminado";</script>';
                }
                
    }
    
}
?>
    <?php
if (isset($_POST['update'])) {
    $update_id = $_POST['update_id'];
    $update_nome = $_POST['update_nome'];
    $update_apelido = $_POST['update_apelido'];
    $update_email = $_POST['update_email'];
    $old_email = $_POST['old_email'];
    $update_nif = $_POST['update_nif'];
    $old_nif = $_POST['old_nif'];
    $update_idade = $_POST['update_idade'];
    $update_sexo = $_POST['update_sexo'];
    $update_nivel = $_POST['update_nivel'];
    $valemail = mysqli_query($conn, "SELECT email FROM utilizadores WHERE email = '$update_email'");
    if ($old_email != $update_email){  
    if(mysqli_num_rows($valemail)) {
        echo' <script>toastr.error("O Email já está a ser usado!","Erro!");</script>';  
        echo "<script>
        $(document).ready(function(){
            $('#editmodal').modal('show');
            $('#update_email').css('border', '1px solid red');
        });             
        </script>"; 
        exit();  
        }
    }
       
         if ($old_nif != $update_nif){  
        $valnif = mysqli_query($conn, "SELECT nif FROM utilizadores WHERE nif = '$update_nif'");
        if(mysqli_num_rows($valnif)) {
            echo' <script>toastr.error("O NIF já está a ser usado!","Erro!");</script>';  
            echo "<script>
                $(document).ready(function(){
                $('#editmodal').modal('show');
                $('#update_nif').css('border', '1px solid red');
                });             
                </script>"; 
                exit();  
        }
    }
         if (!empty($_FILES['update_imagem']['name'])) {  
                    $ImageName = $_FILES['update_imagem']['name'];
                    $fileElementName = 'update_imagem';
                    $type=substr($ImageName,strrpos($ImageName,'.')+1);
                    $target_dir = "../img/users/";
                    $location = $target_dir . $update_id . '.' . $type; 
                    $update_imagem =  $update_id . '.' . $type; 
                    move_uploaded_file($_FILES['update_imagem']['tmp_name'], $location); 
                    $sql = "UPDATE utilizadores SET nome='$update_nome', apelido='$update_apelido', imagem='$update_imagem', email='$update_email', nif='$update_nif', idade='$update_idade',
                    sexo='$update_sexo', nivel='$update_nivel' WHERE id_user=$update_id";
                    if ($conn->query($sql) === true) {
                        echo '<script>window.location.href="utilizadores_lista.php?report=user-editado"</script>';
                    exit();
                    }    
                    }else{
                    $sql2 = "UPDATE utilizadores SET nome='$update_nome', apelido='$update_apelido', email='$update_email', nif='$update_nif', idade='$update_idade',
                    sexo='$update_sexo', nivel='$update_nivel' WHERE id_user=$update_id";
                    if ($conn->query($sql2) === true) {
                        echo '<script>window.location.href="utilizadores_lista.php?report=user-editado"</script>';
                    exit();
                }   
            }  
        
            
}  

?>
</body>
</html>
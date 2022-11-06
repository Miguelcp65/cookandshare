<?php
        include '../../db.php';
        include("../../includes/sessao_admin.php");
        ?>
        
<html>

<head>
    <meta charset="UTF-8">
    <title>Lista de Categorias</title>
    <script src="//code.jquery.com/jquery.min.js"></script>
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
    <link rel="stylesheet" type="text/css" href="../../assets/css/categorias_lista.css">
    <script type="text/javascript" charset="utf8" src="../../assets/js/categorias_lista.js"></script>
    <script type="text/javascript" charset="utf8" src="../../assets/js/navA.js"></script>
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
        if ($_GET["report"] == "categoria-adicionada") {
          echo' <script>toastr.success("Categoria Adicionada com Sucesso","Sucesso!");</script>';
          echo("<script>history.replaceState({},'','$url');</script>");
       }else if ($_GET["report"] == "Categoria-adicionada-sem-imagem") {
        echo' <script>toastr.success("Categoria Adicionada com Sucesso","Sucesso!");</script>';
        echo' <script>toastr.warning("Não atribuiu nenhuma imagem à categoria","Atenção!");</script>';
        echo("<script>history.replaceState({},'','$url');</script>");
      }else if ($_GET["report"] == "categoria-eliminada-erro") {
        echo' <script>toastr.error("Não é possível removel uma categoria que está a ser usada","Erro!");</script>';
        echo("<script>history.replaceState({},'','$url');</script>");
       }else if ($_GET["report"] == "categoria-editada") {
        echo' <script>toastr.success("Categoria Editada com Sucesso","Sucesso!");</script>';
        echo("<script>history.replaceState({},'','$url');</script>");
       }else if ($_GET["report"] == "categorias-eliminadas") {
        echo' <script>toastr.success("Várias Categorias foram eliminadas!","Sucesso!")</script>';
        echo("<script>history.replaceState({},'','$url');</script>");
       }else if ($_GET["report"] == "categoria-eliminada") {
        echo' <script>toastr.success("A Categoria foi eliminada com sucesso!","Sucesso!")</script>';
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
                <h2 class="m-0 text-dark">Tabela de Categorias</h2>
            </div>
            <div class="table-responsive" >
                <table id="tabela" class="table table-striped table-bordered">
                    <thead>
                    <tr class='trh'>
                      <th class='thid'>ID</th>
                      <th class='thnome'>Nome</th>
                      <th class='thimagem'>Imagem</th>
                      <th class='thcriado'>Criação</th>
                      <th class='theditado'>Edição</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                     $result = mysqli_query($conn, "SELECT * FROM categorias");
                     foreach($result as $row) {
                            $id = $row['id_categoria'];
                            $imagem = $row['imagem'];
                            $nome = $row['nome'];               
                            $criado = $row['criado'];
                            $editado = $row['editado'];
                            echo "<tr class='trv'>
                                <td class='tdid'>$id</td>
                                <td class='tdnome'>$nome</td> ";
                                 if ($imagem != 'Sem Imagem') { 
                                  echo"
                                <td class='tdimagem'><img src='../img/categorias/$imagem' class='catei' alt='Imagem'/></td> ";
                                } else {
                                    echo" 
                                <td class='tdsemimagem'>SEM IMAGEM</td>
                                ";
                                }
                                echo"               
                                <td class='tdcriado'>$criado</td>
                                <td class='tdeditado'>$editado</td>
                                ";?>
            </div>
        


            <!--Adicionar Registo -->
            <div class="modal fade" id="addmodal">
                <div class="modal-dialog" role="dialog">
                    <form autocomplete="off" method="post" enctype="multipart/form-data">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Adicionar Categoria</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input name="add_nome" class="iptadd" type="text" id="add_nome" value="<?php echo isset($_POST["add_nome"]) ? $_POST["add_nome"] : ''; ?>" required>
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label class="lb">Nome</label>
                                    </div>
                                    <div class="input-group">
                                        <input name="new_imagem" class="imagem" type="file" name="new_imagem"/>
                                        <label class="lb">Imagem</label>
                                    </div> 
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-info" data-dismiss="modal"></span>
                                    Cancelar</button>
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
                                <h5 class="modal-title">Editar Categoria</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="update_id">
                                <input type="hidden" name="old_nome">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input name="update_nome" class="iptedit" type="text" id="update_nome" value="<?php echo isset($_POST["update_nome"]) ? $_POST["update_nome"] : ''; ?>" required>
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label class="lb">Nome</label>
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
                                <h4 class="modal-title">Tem a certeza que pretende eliminar <strong class="titulodelete"></strong> categoria(s)?</h4>
                                <button type="button" class="close" data-dismiss="modal"
                                    aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="delete_id">
                                <input type="hidden" name="delete_nome">
                                <p>O registo ficará guardado na secção dos registos eliminados.</p>
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
              $valnome = mysqli_query($conn, "SELECT nome FROM categorias WHERE nome = '$nome'");
              if(mysqli_num_rows($valnome)) {
                    echo' <script>toastr.error("Já existe uma categoria com o mesmo nome!","Erro!");</script>';  
                    echo "<script>
                    $(document).ready(function(){
                        $('#addmodal').modal('show');
                        $('#add_nome').css('border', '1px solid red');
                    });             
                    </script>";      
                }else{
              $sql = "INSERT INTO categorias (nome) VALUES ('$nome')";
              if ($conn->query($sql) === true) {
                $id_img = mysqli_query($conn, "SELECT id_categoria FROM categorias WHERE nome ='$nome'");
                foreach($id_img as $rows) {
                   $img_id = $rows['id_categoria']; 
                    } 
                 if (!empty($_FILES['new_imagem']['name'])) {    
                    $ImageName = $_FILES['new_imagem']['name'];
                    $fileElementName = 'new_imagem';
                    $type=substr($ImageName,strrpos($ImageName,'.')+1);
                    $target_dir = "../img/categorias/";
                    $location = $target_dir . $img_id . '.' . $type; 
                    $new_imagem =  $img_id . '.' . $type; 
                    move_uploaded_file($_FILES['new_imagem']['tmp_name'], $location);
                    $sql2 = "UPDATE categorias SET imagem='$new_imagem' WHERE id_categoria='$img_id'";
                    if ($conn->query($sql2) === true) {
                        echo '<script>window.location.href = "categorias_lista.php?report=categoria-adicionada";</script>';
                    }  
                }else{
                    echo '<script>window.location.href = "categorias_lista.php?report=categoria-adicionada-sem-imagem";</script>';
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
    for ($i = 0; $i < count($registo_eliminar_id); $i++) {
        $delete_id = $registo_eliminar_id[$i];
        $delete_nome = $registo_eliminar_nome[$i];
        $img_delete = mysqli_query($conn, "SELECT imagem FROM categorias WHERE id_categoria = '$delete_id'");
                foreach($img_delete as $row) {
                   $img_del = $row['imagem'];  
                }
                if (!($img_del == 'Sem Imagem')){
                    unlink("../img/categorias/$img_del");
                   }
                $sql2 = "DELETE FROM categorias WHERE id_categoria = $delete_id";  
                if ($conn->query($sql2) === true) {
                  if (1 < count($registo_eliminar_id)){
                    echo '<script>window.location.href = "categorias_lista.php?report=categorias-eliminadas";</script>';
                  }else{
                    echo '<script>window.location.href = "categorias_lista.php?report=categoria-eliminada";</script>';
                  }
                }else{
                  echo '<script>window.location.href = "categorias_lista.php?report=categoria-eliminada-erro";</script>';
                }
                
    }
    
}
?>
    <?php
if (isset($_POST['update'])) {
    $update_id = $_POST['update_id'];
    $update_nome = $_POST['update_nome'];
    $old_nome = $_POST['old_nome'];
    if (!empty($_FILES['update_imagem']['name'])) {    
        $ImageName = $_FILES['update_imagem']['name'];
        $fileElementName = 'update_imagem';
        $type=substr($ImageName,strrpos($ImageName,'.')+1);
        $target_dir = "../img/categorias/";
        $location = $target_dir . $update_id . '.' . $type; 
        $update_imagem =  $update_id . '.' . $type; 
        move_uploaded_file($_FILES['update_imagem']['tmp_name'], $location);
    }
    if ($old_nome != $update_nome){
        $select = mysqli_query($conn, "SELECT nome FROM categorias WHERE nome = '$update_nome'");
        if(mysqli_num_rows($select)) {
            echo' <script>toastr.error("Já existe uma categoria com o mesmo nome!","Erro!");</script>';  
                        echo "<script>
                            $(document).ready(function(){
                            $('#editmodal').modal('show');
                            $('#update_nome').css('border', '1px solid red');
                            });             
                            </script>"; 
        }else{
            if (!empty($_FILES['update_imagem']['name'])) {             
                $sql = "UPDATE categorias SET nome='$update_nome', imagem='$update_imagem' WHERE id_categoria=$update_id ";
                if ($conn->query($sql) === true) {
                    echo '<script>window.location.href="categorias_lista.php?report=categoria-editada"</script>';
                }
            }else{
                $sql = "UPDATE categorias SET nome='$update_nome' WHERE id_categoria=$update_id ";
                if ($conn->query($sql) === true) {
                    echo '<script>window.location.href="categorias_lista.php?report=categoria-editada"</script>';
                }
            }
        }
        
    }
    if (!empty($_FILES['update_imagem']['name'])) { 
    $sql = "UPDATE categorias SET nome='$update_nome', imagem='$update_imagem' WHERE id_categoria=$update_id ";
    if ($conn->query($sql) === true) {
        echo '<script>window.location.href="categorias_lista.php?report=categoria-editada"</script>';
    }
}
    
}  
?>
</body>
</html>
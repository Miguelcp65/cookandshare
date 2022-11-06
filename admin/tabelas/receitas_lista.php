<?php
        include '../../db.php';
        include("../../includes/sessao_admin.php");
        ?>
<html>

<head>
    <meta charset="UTF-8">
    <title>Lista de Receitas</title>
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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/fixedheader/3.1.4/css/fixedHeader.dataTables.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/fixedheader/3.1.4/js/dataTables.fixedHeader.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../../assets/css/receitas_lista.css">
    <script type="text/javascript" charset="utf8" src="../../assets/js/receitas_lista.js"></script>
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
        if ($_GET["report"] == "receita-adicionada") {
          echo' <script>toastr.success("Receita Adicionada com Sucesso","Sucesso!");</script>';
          echo("<script>history.replaceState({},'','$url');</script>");
        }else if ($_GET["report"] == "receita-adicionada-sem-imagem") {
            echo' <script>toastr.success("Receita Adicionada com Sucesso","Sucesso!");</script>';
            echo' <script>toastr.warning("Não atribuiu nenhuma imagem à Receita","Atenção!");</script>';
            echo("<script>history.replaceState({},'','$url');</script>");
        }else if ($_GET["report"] == "receita-editada-sem-imagem") {
            echo' <script>toastr.success("Receita Editada com Sucesso","Sucesso!");</script>';
            echo' <script>toastr.warning("Não atribuiu nenhuma imagem à receita","Atenção!");</script>';
            echo("<script>history.replaceState({},'','$url');</script>");
       }else if ($_GET["report"] == "receita-editada") {
            echo' <script>toastr.success("Receita Editadoa com Sucesso","Sucesso!");</script>';
            echo("<script>history.replaceState({},'','$url');</script>");
       }else if ($_GET["report"] == "receitas-eliminadas") {
            echo' <script>toastr.success("Vários Receitas foram eliminadas!","Sucesso!")</script>';
            echo("<script>history.replaceState({},'','$url');</script>");
       }else if ($_GET["report"] == "receita-eliminada") {
            echo' <script>toastr.success("A Receita foi eliminada com sucesso!","Sucesso!")</script>';
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
                <h2 class="m-0 text-dark">Tabela de Receitas</h2>
            </div>
            <div class="table-responsive" >
                <table id="tabela" class="table table-striped table-bordered">
                    <thead>
                    <tr class='trh'>
                      <th class='thid'>ID</th>
                      <th class="thnome">Nome</th>
                      <th class="thimagem">Imagem</th>
                      <th >Utilizador</th>
                      <th >Descrição</th>
                      <th >Duração</th>
                      <th >ID Ingredientes</th>
                      <th >Ingredientes Desc</th>
                      <th >Passos</th>
                      <th >Categoria</th>
                      <th >Nº Pessoas</th>
                      <th >Classificação</th>
                      <th >Total Classi</th>
                      <th >Nº Classificações</th>
                      <th >Dificuldade</th>
                      <th >Privacidade</th>
                      <th >Estado</th>
                      <th class='thcriado'>Criação</th>
                      <th class='theditado'>Edição</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                     $result = mysqli_query($conn, "SELECT * FROM receitas");
                     foreach($result as $row) {
                            $id = $row['id_receita'];
                            $nome = $row['nome']; 
                            $imagem = $row['imagem'];
                            $id_user = $row['id_user']; 
                            $descricao = $row['descricao'];  
                            $duracao = $row['duracao']; 
                            $id_ingredientes = $row['id_ingredientes']; 
                            $ingredientes_desc = $row['ingredientes_desc']; 
                            $passos = $row['passos']; 
                            $id_categoria = $row['id_categoria']; 
                            $npessoas = $row['npessoas']; 
                            $classificacao = $row['classificacao'];
                            $total_classificacao = $row['total_classificacao'];
                            $nclassificacoes = $row['nclassificacoes'];  
                            $dificuldade = $row['dificuldade'];  
                            $privacidade = $row['privacidade'];  
                            $estado = $row['estado'];  
                            $criado = $row['criado'];
                            $editado = $row['editado'];
                            echo "<tr class='trv'>
                                <td class='tdid'>$id</td>
                                <td class='tdnome'>$nome</td> ";
                                 if ($imagem != 'Sem Imagem') { 
                                  echo"
                                <td class='tdimagem'><img src='../img/receitas/$imagem' class='recim' alt='Imagem'/></td> ";
                                } else {
                                    echo" 
                                <td class='tdsemimagem'>SEM IMAGEM</td>
                                ";
                                }
                                echo"   
                                <td class='tdid_user'>$id_user</td>
                                <td class='tdescricao'>$descricao</td> 
                                <td class='tdduracao'>$duracao</td>
                                <td class='tdingredientes'>$id_ingredientes</td>
                                <td class='tdingredientes_desc'>$ingredientes_desc</td>
                                <td class='tdpassos'>$passos</td>
                                <td class='tdid_categoria'>$id_categoria</td>           
                                <td class='tdnpessoas'>$npessoas</td>
                                <td class='tdclassificacao'>$classificacao</td>
                                <td class='tdtotal_classificacao'>$total_classificacao</td>
                                <td class='tdnclassificacoes'>$nclassificacoes</td>
                                <td class='tddificuldade'>$dificuldade</td>
                                <td class='tdprivacidade'>$privacidade</td>
                                <td class='tdestado'>$estado</td>
                                <td class='tdcriado'>$criado</td>
                                <td class='tdeditado'>$editado</td>
                                ";?>
            </div>
        



            <!--Editar Registo -->
            <div class="modal fade" id="editmodal">
                <div class="modal-dialog" role="dialog">
                    <form autocomplete="off" method="post" enctype="multipart/form-data">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Editar Receita</h5>
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
                                    $qsexo = "SELECT DISTINCT sexo FROM receitas ORDER BY sexo ASC";
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
                                    $qnivel = "SELECT DISTINCT nivel FROM receitas ORDER BY nivel ASC";
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
                            <h4 class="modal-title">Tem a certeza que pretende eliminar <strong class="titulodelete"></strong> receitas(s)?</h4>
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
        $img_delete = mysqli_query($conn, "SELECT imagem FROM receitas WHERE id_receita = '$delete_id'");
                foreach($img_delete as $row) {
                   $img_del = $row['imagem'];  
                }
                if (!($img_del == 'Sem Imagem')){
                    unlink("../img/receitas/$img_del");
                   }
                $sql1 = "DELETE FROM reports WHERE id_receita = '$delete_id'";
                $sql3 = "DELETE FROM classificacoes WHERE id_receita = '$delete_id'";
                $sql4 = "DELETE FROM favoritos WHERE id_receita ='$delete_id'";
                $sql2 = "DELETE FROM receitas WHERE id_receita = '$delete_id'";  
                if ($conn->query($sql1) === true && $conn->query($sql2) === true && $conn->query($sql3) === true && $conn->query($sql4) === true) {
                    if (1 < count($registo_eliminar_id)){
                        echo '<script>window.location.href = "receitas_lista.php?report=receitas-eliminadas";</script>';
                    }else{
                        echo '<script>window.location.href = "receitas_lista.php?report=receita-eliminada";</script>';
                    }
                }
    }
    
}
?>
   
</body>
</html>
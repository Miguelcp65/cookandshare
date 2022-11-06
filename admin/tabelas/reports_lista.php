<?php
        include '../../db.php';
        include("../../includes/sessao_admin.php");
        ?>
<html>

<head>
    <meta charset="UTF-8">
    <title>Lista de Reports</title>
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
    <link rel="stylesheet" type="text/css" href="../../assets/css/ingredientes_lista.css">
    <script type="text/javascript" charset="utf8" src="../../assets/js/navA.js"></script>
    <script type="text/javascript" charset="utf8" src="../../assets/js/reports_lista.js"></script>
    <link rel="stylesheet" href="../../assets/css/material.min.css">
    <script src="../../assets/js/material.min.js"></script>
    <link rel="stylesheet" href="../../assets/css/toastr.css">
    <script src="../../assets/js/toastr.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="//cdn.datatables.net/plug-ins/1.10.21/filtering/type-based/accent-neutralise.js"></script>
</head>

<body>
    
<?php
      include("../../includes/navsA.html");
?>
<script type="text/javascript">
    
</script>
<br>
<br>
    <div class="main-card mb-3 card">
        <div class="card-body">
            <div class="tabela">
                <h2 class="m-0 text-dark">Tabela de Reports</h2>
            </div>
            <div class="table-responsive" >
                <table id="tabela" class="table table-striped table-bordered">
                    <thead>
                    <tr class='trh'>
                      <th class=''>ID</th>
                      <th class=''>ID Utilizador</th>
                      <th class=''>ID Receita</th>
                      <th class=''>Motivo</th>
                      <th class=''>Descrição</th>
                      <th class='thcriado'>Criação</th>
                      <th class='theditado'>Edição</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                     $result = mysqli_query($conn, "SELECT * FROM reports");
                     foreach($result as $row) {
                            $id = $row['id_report'];
                            $id_user = $row['id_user'];
                            $id_receita = $row['id_receita'];  
                            $motivo = $row['motivo'];   
                            $descricao = $row['descricao'];              
                            $criado = $row['criado'];
                            $editado = $row['editado'];
                            echo "<tr class='trv'>
                                <td class='tdid'>$id</td>
                                <td>$id_user</td>    
                                <td>$id_receita</td>     
                                <td>$motivo</td>  
                                <td>$descricao</td>       
                                <td class='tdcriado'>$criado</td>
                                <td class='tdeditado'>$editado</td>
                                ";?>
            </div>
                </form>
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
</body>
</html>
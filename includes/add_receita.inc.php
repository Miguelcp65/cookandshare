<?php
require '../db.php';
if (isset($_POST['adddreceita'])) {
    $nome = $_POST['nome'];
    $duracao = $_POST['duracao'];
    $duracao = intval($duracao); 
    $descricao = $_POST['desc'];
    $descing = $_POST['descing'];
    $passos = $_POST['passos'];
    $npessoas = $_POST['npessoas'];
    $npessoas = intval($npessoas); 
    $categoria = $_POST['categoria'];
    $privacidade = $_POST['privacidade'];
    $dificuldade = $_POST['dif'];
    $ingres = $_POST['ingres'];
    $userid = $_POST['userid'];
    $estado = "Pendente";
    $id_ingredientes = array();
    foreach ($ingres as $ingr){
    $ingsq = mysqli_query($conn, "SELECT id_ingrediente FROM ingredientes WHERE nome ='$ingr'");
    foreach($ingsq as $rows) {
        array_push($id_ingredientes, $rows['id_ingrediente']);
         } 
        }
        $id_ingredientes = implode(",", $id_ingredientes);
        $categoria = intval($categoria); 
        $sql = "INSERT INTO receitas (id_user, nome, descricao, duracao, ingredientes_desc, id_ingredientes, passos, id_categoria, npessoas, dificuldade, privacidade, estado)
         VALUES ('$userid', '$nome','$descricao', '$duracao', '$descing' , '$id_ingredientes', '$passos', '$categoria', '$npessoas', '$dificuldade', '$privacidade', '$estado')";
        if ($conn->query($sql) === true) {
            if (!empty($_FILES['imagem']['name'])) {   
                $id_img = mysqli_query($conn, "SELECT * FROM receitas ORDER BY id_receita DESC lIMIT 1");
                foreach($id_img as $id_imgrow) {
                    $id_rec_img = $id_imgrow['id_receita'];
                } 
                $id_rec_img = intval($id_rec_img); 
                $ImageName = $_FILES['imagem']['name'];
                $fileElementName = 'imagem';
                $type=substr($ImageName,strrpos($ImageName,'.')+1);
                $target_dir = "../assets/img/receitas/";
                $location = $target_dir . $id_rec_img . '.' . $type; 
                $imagem =  $id_rec_img . '.' . $type; 
                move_uploaded_file($_FILES['imagem']['tmp_name'], $location);
                var_dump($imagem);
                $sql2 = "UPDATE receitas SET imagem='$imagem' WHERE id_receita='$id_rec_img'";
                if ($conn->query($sql2) === true) {
                    header("Location: ../painel_receitas.php?report=receita-add");
                    exit();
                } 
            }else{
                header("Location: ../painel_receitas.php?report=receita-add-sem-imagem");
                    exit();
            }   
        }
}
      ?>
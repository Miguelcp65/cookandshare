<?php
require '../db.php';
if (isset($_POST['edit'])) {
    $id_user = $_POST['userid'];
    $id_user = intval($id_user); 
    $nome = $_POST['nome'];
    $apelido = $_POST['apelido'];
    $nif = $_POST['nif'];
    $nif = intval($nif); 
    $old_nif = $_POST['old_nif'];
    $old_nif = intval($old_nif); 
    $idade = $_POST['idade'];
    $sexo = $_POST['sexo'];
    $idade = intval($idade); 

    if ($old_nif != $nif){  
        $valnif = mysqli_query($conn, "SELECT nif FROM utilizadores WHERE nif = '$nif'");
        if(mysqli_num_rows($valnif)) {
            echo' <script>
            toastr.error("O NIF já está a ser usado!","Erro!");</script>';  
                exit();  
        }
    }
    if (!empty($_FILES['imagem']['name'])) {  
        $ImageName = $_FILES['imagem']['name'];
        $fileElementName = 'imagem';
        $type=substr($ImageName,strrpos($ImageName,'.')+1);
        $target_dir = "../admin/img/users/";
        $location = $target_dir . $id_user . '.' . $type; 
        $imagem =  $id_user . '.' . $type; 
        move_uploaded_file($_FILES['imagem']['tmp_name'], $location); 
        $sql = "UPDATE utilizadores SET nome='$nome', apelido='$apelido', imagem='$imagem', nif='$nif', idade='$idade',
        sexo='$sexo' WHERE id_user=$id_user";
        if ($conn->query($sql) === true) {
            echo '<script>window.location.href="../perfil.php?report=user-editado"</script>';
        exit();
        }    
        }else{
        $sql2 = "UPDATE utilizadores SET nome='$nome', apelido='$apelido', nif='$nif', idade='$idade',
        sexo='$sexo' WHERE id_user=$id_user";
        if ($conn->query($sql2) === true) {
            echo '<script>window.location.href="../perfil.php?report=user-editado"</script>';
        exit();
    } 
}  
}
      ?>
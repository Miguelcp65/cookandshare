<?php
require '../db.php';
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $select = mysqli_query($conn, "SELECT * FROM utilizadores WHERE email = '$email'");
    if(mysqli_num_rows($select)) {
            while($row = mysqli_fetch_assoc($select)) {
                $pass_user = $row['password'];
                $id_user = $row['id_user'];
                $nivel_user = $row['nivel'];
                $email_user = $row['email'];
            }
        $pwdcheck= password_verify($password, $pass_user);
    if ($pwdcheck == false) {
        header("Location: ../login.php?report=password-errada");
        exit();
      }else {
        session_start();
        $_SESSION['id'] = $id_user;
        $nivel_user = intval($nivel_user);  
        $_SESSION['nivel'] = $nivel_user;
        $_SESSION['email'] = $email_user;
        if ($_SESSION['nivel'] == 1){
            header("Location: ../receitas.php"); 
            exit();
        }else{
            header("Location: ../escolha.php"); 
            exit();
        }
      }
    }else{
        header("Location: ../login.php?report=nao-registado");
        exit();
    }
    
}
      ?>
      
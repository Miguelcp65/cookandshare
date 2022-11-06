<?php
require '../db.php';
if (isset($_POST['registar'])) {
      $password = $_POST['password'];
    $rpassword = $_POST['rpassword'];
    if( $password != $rpassword){
      header("Location: ../login.php?report=passwords-diferentes");
      exit();
    }
    $email = $_POST['email'];
    $nome = $_POST['nome'];
    $apelido = $_POST['apelido'];
    $nivel = 1;
    $token = md5( rand(0,1000) );
    $select = mysqli_query($conn, "SELECT email FROM utilizadores WHERE email = '$email'");
    if(mysqli_num_rows($select)) {
        header("Location: ../login.php?report=email-usado");
        exit();
    }
    $hashpassword = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO utilizadores (email, nome, apelido, password, nivel, token_verificacao) VALUES ('$email', '$nome','$apelido', '$hashpassword', '$nivel' , '$token')";
          if ($conn->query($sql) === true) {
            session_start();
                  $_SESSION['email'] = $email;  
                  $_SESSION['nivel'] = $nivel; 
                  $_SESSION['nome'] = $nome;
                  $to = $email;
                  $subject = "Verificação de Conta";
                  From: "cooknshare@dwmcooknshare.com";
                  "Return-Path: cooknshare@dwmcooknshare.com";
                  $message = "<h1 style='text-align:center; color:#3D4852'>CooknShare</h1>

                  <div style='border-top:2px solid #edeff2; border-bottom:2px solid #edeff2; width:100%; padding:20px; margin: 0 auto;'>
                  <p style='font-size:19px; color:#3D4852'>" . $nome." " . $apelido.", </p>
                  
                  
                  <p style='font-size:16px; color:grey; color:#3D4852'> Por favor, confirme a sua conta clicando no botão abaixo:</p>
                  <br>
                  
                  <div style='text-align:center'>

                  <a type='button' style='text-align: center; 
                  text-decoration: none; padding: 15px 40px; border-radius:5px; line-height:45px;background-color: #D17240; color:white; font-size:16px; border: none' 
                  href='http://dwmcooknshare.com/verificacao.php?email=$email&token=$token'>Verificar Conta</a><BR><BR>
                  </div>


                  <p style='font-size:16px; color:#3D4852'>Se não criou nenhuma conta, não clique no botão!</p>
                  <br>

                  <p style='font-size:16px; margin-bottom: 0 !important; color:#3D4852'>Cumprimentos,</p>
                  <p style='font-size:16px; margin-top: 0 !important; color:#3D4852'>CooknShare</p>
                  <hr style='margin-top:0.5px solid #edeff2;'></hr>
                  <p style='font-size:12px; color:#3D4852'>Se estiver com problemas ao clicar no botão, copie e cole este link para o seu navegador:</p>
                  <a href='http://dwmcooknshare.com/verificacao.php?email=$email&token=$token' style='font-size:12px; color:blue'>http://dwmcooknshare.com/verificacao.php?email=$email&token=$token</a>
                  <br>
                  <br>
                  </div>
                  
                  <br>
                  <p style='font-size:12px; text-align:center; color:#AEAEAE'>© 2019 CooknShare. All rights reserved.</p>
                  <br>
                  ";
                  $headers = "MIME-Version: 1.0" . "\r\n";
                  $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                  $headers .= 'From: <cooknshare@dwmcooknshare.com> CooknShare '."\r\n";
                  mail($to, $subject, $message, $headers,'-fcooknshare@dwmcooknshare.com');   
                header("Location: ../receitas.php");
                exit();
          }
     
          header("Location: ../receitas.php");
          exit();
   
}
      ?>
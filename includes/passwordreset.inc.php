<?php
require '../db.php';
if (isset($_POST['resetpass'])) {
    $email = $_POST['email'];
    $token_pass = md5( rand(0,1000) );
    $select = mysqli_query($conn, "SELECT email FROM utilizadores WHERE email = '$email'");
    if((mysqli_num_rows($select) == 0)) {
        header("Location: ../login.php?report=email-nao-existe");
        exit();
    }else{
    $sql = "UPDATE utilizadores SET token_passwordreset = '$token_pass' WHERE email = '$email'";
          if ($conn->query($sql) === true) {
                  $to = $email;
                  $subject = "Reposição de Password";
                  From: "cooknshare@dwmcooknshare.com";
                  "Return-Path: cooknshare@dwmcooknshare.com";
                  $message = "<h1 style='text-align:center; color:#3D4852'>CooknShare</h1>

                  <div style='border-top:2px solid #edeff2; border-bottom:2px solid #edeff2; width:38%; padding:20px; margin: 0 auto;'>
                  <p style='font-size:19px; color:#3D4852'>Reposição de password</p>
                  
                  
                  <p style='font-size:16px; color:grey; color:#3D4852'> Clique no botão abaixo para repôr a sua nova password</p>
                  <br>
                  
                  <div style='text-align:center'>

                  <a type='button' style='text-align: center; 
                  text-decoration: none; padding: 15px 40px; border-radius:5px; line-height:45px;background-color: #D17240; color:white; font-size:16px; border: none' 
                  href='http://dwmcooknshare.com/passwordreset.php?email=$email&token=$token_pass'>Repôr Password</a><BR><BR>
                  </div>


                  <p style='font-size:16px; color:#3D4852'>Se não fez nenhum pedido de reposição de password, não clique no botão!</p>
                  <br>

                  <p style='font-size:16px; margin-bottom: 0 !important; color:#3D4852'>Cumprimentos,</p>
                  <p style='font-size:16px; margin-top: 0 !important; color:#3D4852'>CooknShare</p>
                  <hr style='margin-top:0.5px solid #edeff2;'></hr>
                  <p style='font-size:12px; color:#3D4852'>Se estiver com problemas ao clicar no botão, copie e cole este link para o seu navegador:</p>
                  <a href='http://dwmcooknshare.com/passwordreset.php?email=$email&token=$token_pass' style='font-size:12px; color:blue'>http://dwmcooknshare.com/passwordreset.php?email=$email&token=$token_pass</a>
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
                  header("Location: ../login.php?report=passreset-email-enviado");
                  exit();
          }
     
          header("Location: ../preceitas.php");
          exit();
        }
}
if (isset($_POST['rpform'])) {
    $emailrp = $_POST['email'];
    $password = $_POST['password'];
    $rpassword = $_POST['rpassword'];
    $sql1 =  mysqli_query($conn, "SELECT * FROM utilizadores WHERE email = '$emailrp'");
    $num_rows = mysqli_num_rows($sql1);
    if ($num_rows != 0) {
      $token_pass = md5( rand(0,1000) );
      $hashpassword = password_hash($password, PASSWORD_DEFAULT);
    $sql = "UPDATE utilizadores SET password = '$hashpassword', token_passwordreset = '$token_pass' WHERE email = '$emailrp'";
      if ($conn->query($sql) === true) {
        header("Location: ../login.php?report=passreset-password-reposta");
        exit();
      } 
    }else{
      header("Location: ../login.php?report=passreset-ocorreu-erro");
      exit();
    } 
}

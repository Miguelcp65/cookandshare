<?php
include 'db.php';
session_start();
?>
<html>
    <head>
      <meta charset="utf-8">
      <title>CN'S | Reposição de Passoword</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
      <link rel="stylesheet" href="assets\css\paswordreset.css">
      <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
      <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
  </head>
    <body>
  <?php
  if (isset($_GET["email"]) AND (isset($_GET["token"]))){
      $emailrp= $_GET["email"];
      $tokenrp= $_GET["token"];
      if (isset($_SERVER['HTTP_REFERER'])){
        $pagina= $_SERVER['HTTP_REFERER'];
        $url = "$pagina";
        $url = strtok($url, "?");
        echo("<script>history.replaceState({},'','$url');</script>");
        }
          echo '
          <form method="post" action="includes\passwordreset.inc.php">
          <h1 class="tip">Reposição de Password</h1>
          <div class="cont" id="cont">
            <div class="resetpassword">
            <label>
            <span>Password</span>
            <p>
            <input type="hidden" name="email" value="'.$emailrp.'">
          <input type="password" minlength="8" id="p" name="password" class="password" required>
          <!--      <button class="unmask" type="button"></button> -->
        
            <div id="strong"><span></span></div>
        
        <small>A Password tem de ter pelo menos 8 caracteres</small>
          </label>
          </p>
          <label>
            <span>Repita a Password</span>
            <p>
            <input type="password" minlength="8" class="password" id="p-c" name="rpassword" required/>
        <!--      <button class="unmask" type="button"></button> -->
            <div id="valid"></div>
          </label>
          </p>
          <button type="submit" id="repor" name="rpform" class="submit">Repôr Password</button>
                </div>
              </div>
              </form>
    ';

  }
  ?>
  <?php include("includes/footer.html");
?>
    </body>
    <script src="assets\js\passwordreset.js"></script>
  </html>


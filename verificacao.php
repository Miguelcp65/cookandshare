<?php
include 'db.php';
session_start();
?>
<html>
  <head>
    <meta charset="utf-8">
    <title>CN'S | Verificação</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="assets/css/verficacao.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
  </head>
  <body>
      
<?php
if (isset($_GET["email"]) AND (isset($_GET["token"]))){
    $emailver= $_GET["email"];
    $tokenver= $_GET["token"];
    session_start();
    session_unset();
    session_destroy();
    session_start();
    $_SESSION['email'] = $emailver;  
    $sql = "UPDATE utilizadores SET verificacao='Sim' WHERE email='$emailver' AND token_verificacao='$tokenver'";
      if ($conn->query($sql) === true) {
        echo '
        <div class="modalver">
      <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
        <h3 class="modal-title">Conta Verificada!</h3>
        </div>
        <div class="modal-body">
        <h4>A sua conta está agora verificada!</h4>
        <br>
            <div class="success-checkmark">
                <div class="check-icon">
                    <span class="icon-line line-tip"></span>
                    <span class="icon-line line-long"></span>
                <div class="icon-circle"></div>
                <div class="icon-fix"></div>
                </div>
            </div>
        </div>    
        <div class="modal-footer">
          <button type="button" class="btn btn-warning" id="btn" data-dismiss="modal">Página Inicial</button>
        </div>
      </div>
      
    </div>
  </div>
        
        ';
      }
}

?>
<?php include("includes/footer.html");
?>
  </body>
  <script>
     document.getElementById("btn").onclick = function () {
        location.href = "preceitas.php";
    };
  </script>
</html>


<?php 
        include 'db.php';
        ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="//code.jquery.com/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
    <title>Index</title>
    <link rel="stylesheet" href="assets\css\navU.css">
    <script type="text/javascript" charset="utf8" src="../assets/js/navU.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Dosis&display=swap">
</head>

<body>

    <!-- Navbar -->
    <div class="navv" id="navbar">
        <div class="navbar">
            <img onclick="location.href = 'index.php';" src="assets\img\logo.png" alt="Logo">
            <ul>
                <li><a href="receitas.php">Receitas</a></li>
                <li><a href="destaques.php">Destaques</a></li>
                <?php
              
                if (isset($_SESSION['email'])) {
                echo '<li><a href="painel_receitas.php">Painel Receitas</a></li>';
                }      
                ?>
                <li><a href="contactos.php">Contato</a></li>
                <?php
                 if (isset($_SESSION['email'])) {
                $_SESSION['nivel'] = intval($_SESSION['nivel']);  
                if  ($_SESSION['nivel'] == 2){
                    echo'
                    <li><a href="admin/tabelas/ingredientes_lista.php">Admin</a></li>
                    ';
                    }
                }
                ?>
                <?php
                if (isset($_SESSION['email'])) {        
                    echo '
                    <li><a href="perfil.php">Perfil</a></li>
                    <li><a href="includes/logout.php">Logout</a></li>';
                }else{
                echo '<li><a href="login.php">Login</a></li>';
                }
                ?>
             <li><a id="navCollapse" class="nav-link"><span><i class="fas fa-align-justify"></i></span></a></li>   
            </ul>
        </div>
    </div>
</body>
</html>
<?php 
session_start();
if (!isset($_SESSION['id'])) {
    header('Location:../../index.php');
}else{
    $_SESSION['nivel'] = intval($_SESSION['nivel']); 
    if  ($_SESSION['nivel'] != 2){
        header('Location:../../index.php');
    }
}

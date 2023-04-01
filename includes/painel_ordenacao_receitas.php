<?php 
$sid_user =1;
$resultrec = mysqli_query($conn, "SELECT receitas.nome, receitas.estado, receitas.id_user, receitas.npessoas, receitas.duracao, receitas.dificuldade, receitas.id_categoria, receitas.id_receita, 
receitas.imagem, receitas.classificacao, categorias.nome AS 'catnome' FROM receitas  INNER JOIN categorias ON receitas.id_categoria = categorias.id_categoria
 WHERE receitas.id_user ='$sid_user' ORDER BY classificacao DESC");
if (isset($_SERVER['HTTP_REFERER'])){
            $pagina= $_SERVER['HTTP_REFERER'];
            $url = "painel_receitas.php";
            }
            if (isset($_GET["ordem"])){
                if ($_GET["ordem"] == "alfa") {
                   echo '<script> $(".selected").removeClass("selected"); document.getElementById("orderalfa").className = "selected";</script>';
                    $resultrec = mysqli_query($conn, "SELECT receitas.nome,  receitas.estado, receitas.npessoas, receitas.duracao, receitas.dificuldade, receitas.id_receita, 
                    receitas.imagem, receitas.classificacao, categorias.nome AS 'catnome' FROM receitas INNER JOIN categorias ON receitas.id_categoria = categorias.id_categoria
                    WHERE receitas.id_user ='$sid_user' ORDER BY nome ASC");
                  echo("<script>history.replaceState({},'','$url');</script>");
               }else if ($_GET["ordem"] == "recentes") {
                echo '<script> $(".selected").removeClass("selected"); document.getElementById("orderrecentes").className = "selected";</script>';
                $resultrec = mysqli_query($conn, "SELECT receitas.nome, receitas.criado,  receitas.estado, receitas.npessoas, receitas.duracao, receitas.dificuldade, receitas.id_receita, 
                receitas.imagem, receitas.classificacao, categorias.nome AS 'catnome' FROM receitas INNER JOIN categorias ON receitas.id_categoria = categorias.id_categoria
                WHERE receitas.id_user ='$sid_user' ORDER BY criado DESC");
              echo("<script>history.replaceState({},'','$url');</script>");
               }else if ($_GET["ordem"] == "class") {
                echo '<script> $(".selected").removeClass("selected"); document.getElementById("orderclass").className = "selected";</script>';
                $resultrec = mysqli_query($conn, "SELECT receitas.nome, receitas.npessoas,  receitas.estado, receitas.duracao, receitas.dificuldade, receitas.id_receita, 
                receitas.imagem, receitas.classificacao, categorias.nome AS 'catnome' FROM receitas INNER JOIN categorias ON receitas.id_categoria = categorias.id_categoria
                WHERE receitas.id_user ='$sid_user'  ORDER BY classificacao DESC");
                 echo("<script>history.replaceState({},'','$url');</script>");
            }
}
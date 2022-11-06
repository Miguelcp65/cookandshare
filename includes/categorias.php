    <?php 
            include 'db.php';
            ?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Index</title>
        <link rel="stylesheet" href="assets\css\categorias.css">
    </head>

    <body>
    <div class="menus" id="menus">
            <div class="lmenus">
            <?php 
                        $result = mysqli_query($conn, "SELECT * FROM categorias");
                        foreach($result as $row) {
                                $id = $row['id_categoria'];
                                $nome = $row['nome'];
                                $imagem = $row['imagem'];
                                echo '
                                <input type="hidden" name="categoria" id="rid" value="'.$id.'">
                                <div id="'.$id.'" class="col" style="background-image:url(../admin/img/categorias/' .$imagem.');"> 
                                <div class="lista" >
                                <span>'.$nome.'</span>
                                <input type="hidden" name="categorianome" id="rnome" value="'.$nome.'">
                                </div>
                            </div>';
            }
            ?>
            </div>
        </div>
    </body>
    <script>
  $('.col').click(function() {
    var rnome = $(this).find("#rnome").val();
    var rid = $(this).find("#rid").val();
    rnome = rnome.toLowerCase();
    rnome = rnome.normalize("NFD").replace(/[\u0300-\u036f]/g, "")
    window.location.href = "receitas_" + rnome + ".php";
});

    </script>
    </html>
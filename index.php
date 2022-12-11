<?php
session_start();
?>
<!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Exportando CSV e salvar no banco</title>
    </head>
    <body>
    <h1>Importar Excel.csv</h1>
    <?php
        if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);

        }
    ?>
    <form method="post" action="upload_csv.php" enctype="multipart/form-data">
        <label>Arquivo:</label>
        <input type="file" name="file_csv" id="file_csv" accept="text/csv"><br><br>
        <input type="submit" value="Enviar">


    </form>
        <?php
        require __DIR__ . "/vendor/autoload.php";
       $url  =  new \Core\ConfigController();
        ?>
    </body>

</html>
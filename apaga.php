<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Apaga</title>
</head>
<body>
        <?php
        //var_dump($_GET);
    
        $id = $_GET['id'];
        
        $ligacao = new mysqli("localhost", "root", "", "banco");

        /* check connection */
        if ($ligacao->connect_errno) {
            printf("Conexão falhou: %s\n", $mysqli->connect_error);
            exit();
        }

        $comando = "DELETE FROM `comentarios` WHERE `comentarios`.`id` = $id";
    
        /* Create table doesn't return a resultset */
        if ($ligacao->query($comando) === TRUE) {
            printf("Linha com id=$id apagada.\n");
        }


        $ligacao->close();
    ?>    
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Salva</title>
</head>
<body>
    <?php
        //var_dump($_GET);
    
        $nome = $_GET['nome'];
        $email = $_GET['email'];
        $comentario = $_GET['comentario'];
    
        $ligacao = new mysqli("localhost", "root", "", "banco");

        /* check connection */
        if ($ligacao->connect_errno) {
            printf("Conexão falhou: %s\n", $mysqli->connect_error);
            exit();
        }

        $comando = "INSERT INTO `comentarios` (`id`, `nome`, `email`, `texto`) VALUES (NULL, '$nome', '$email', '$comentario')";
    
        /* Create table doesn't return a resultset */
        if ($ligacao->query($comando) === TRUE) {
            printf("Comentário salvo.\n");
        }


        $ligacao->close();
    ?>
</body>
</html>
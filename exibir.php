<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Exibir comentários</title>
</head>
<body>
    <table border="1">
        <tr>
            <th>Nome:</th>
            <th>E-mail:</th>
            <th>Comentário:</th>
        </tr>
        <?php
        $ligacao = new mysqli("localhost", "root", "", "banco");

        /* check connection */
        if (mysqli_connect_errno()) {
            printf("Conexao falhou: %s\n", mysqli_connect_error());
            exit();
        }
        
        $query = "SELECT `id`, `nome`, `email`, `texto` FROM `comentarios`";

        if ($stmt = $ligacao->prepare($query)) {

            /* execute statement */
            $stmt->execute();

            /* bind result variables */
            $stmt->bind_result($id, $nome, $email, $comentario);

            /* fetch values */
            while ($stmt->fetch()) {
                echo "<tr>";
                echo "<td>$nome</td>";
                echo "<td>$email</td>";
                echo "<td>$comentario</td>";
                echo "<td><a href='apaga.php?id=$id'>Apagar</a></td>";
                echo "</tr>";
            }

            /* close statement */
            $stmt->close();
        }

        /* close connection */
        $ligacao->close();
        ?>
    </table>
</body>
</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Contatos</title>
</head>

<body>
    <header>
        <h3>Contatos</h3>
    </header>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Telefone</th>
                <th>Sexo</th>
                <th>Data de Nasc.</th>
            </tr>
        </thead>

        <?php

        $sql = "SELECT * FROM tbcontatos";
        $rs = mysqli_query($conexao, $sql) or die("Erro ao executar a consulta!" . mysqli_error($conexao));
        while ($dados = mysqli_fetch_assoc($rs)) {
        
        ?>

            <tbody>
                <tr>
                    <td><?= $dados["idContato"] ?></td>
                    <td><?= $dados["nomeContato"] ?></td>
                    <td><?= $dados["emailContato"] ?></td>
                    <td><?= $dados["telefoneContato"] ?></td>
                    <td><?= $dados["sexoContato"] ?></td>
                    <td><?= $dados["dataNascContato"] ?></td>
                </tr>

            <?php
        }
            ?>

            </tbody>
    </table>



</body>

</html>
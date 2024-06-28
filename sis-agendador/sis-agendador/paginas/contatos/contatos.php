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

    <div>
        <a href="index.php?menuop=cad-contato">Novo Contato</a>
    </div>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Telefone</th>
                <th>Endereço</th>
                <th>Sexo</th>
                <th>Data de Nasc.</th>
                <th>Editar</th>
            </tr>
        </thead>

        <?php

        $sql = "SELECT idContato,
            UPPER(nomeContato) AS nomeContato,
            LOWER(emailContato) AS emailContato,
            telefoneContato,
            UPPER(enderecoContato) AS enderecoContato,
            CASE
            	WHEN sexoContato = 'F' THEN 'FEMININO'
            	WHEN sexoContato = 'M' THEN 'MASCULINO'
            ELSE
            	'NÂO ESPECIFICADO'
            END AS sexoContato,
            dataNascContato,
            DATE_FORMAT(dataNascContato, '%d/%m/%Y') AS dataNascContato

            FROM tbcontatos";

        $rs = mysqli_query($conexao, $sql) or die("Erro ao executar a consulta!" . mysqli_error($conexao));
        while ($dados = mysqli_fetch_assoc($rs)) {

        ?>

            <tbody>
                <tr>
                    <td><?= $dados["idContato"] ?></td>
                    <td><?= $dados["nomeContato"] ?></td>
                    <td><?= $dados["emailContato"] ?></td>
                    <td><?= $dados["telefoneContato"] ?></td>
                    <td><?= $dados["enderecoContato"] ?></td>
                    <td><?= $dados["sexoContato"] ?></td>
                    <td><?= $dados["dataNascContato"] ?></td> <!-- "< ? = ? >" é outra forma de codar em php  -->
                    <td><a href="index.php?menuop=editar-contato&idContato=<?= $dados["idContato"]?>">Editar</a></td>
                </tr>

            <?php
        }
            ?>

            </tbody>
    </table>



</body>

</html>
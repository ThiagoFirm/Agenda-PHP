<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    -->
    <title>Página de Contatos</title>
</head>

<body>
    <header>
        <h3>Contatos</h3>
    </header>

    <div>
        <a href="index.php?menuop=cad-contato">Novo Contato</a>
    </div>

    <div>
        <form action="index.php?menuop=contatos" method="post">
        <input type="text" name="txt_pesquisa">
        <input type="submit" name="Pesquisar">
        </form>
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
                <th>Excluir</th>
            </tr>
        </thead>

        <?php

        $quantidade = 10;

        $pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1; // "?:" uma forma de simplifica do if em php

        $inicio = ($quantidade * $pagina) - $quantidade;


        $txt_pesquisa = (isset($_POST['txt_pesquisa'])) ? $_POST['txt_pesquisa'] : "";
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

            FROM tbcontatos WHERE idContato = '{$txt_pesquisa}' OR 
            nomeContato LIKE '%{$txt_pesquisa}%' 
            ORDER BY nomeContato ASC
            LIMIT $inicio, $quantidade
            ";

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
                    <td><a href="index.php?menuop=editar-contato&idContato=<?= $dados["idContato"] ?>">Editar</a></td>
                    <td><a href="index.php?menuop=excluir-contato&idContato=<?= $dados["idContato"] ?>">Excluir</a></td>
                </tr>

            <?php
        }
            ?>

            </tbody>
    </table>
    <br>
    <?php

    $sqlTotal = "SELECT idContato FROM tbcontatos";
    $qrTotal = mysqli_query($conexao, $sqlTotal) or die(mysqli_error($conexao));
    $numTotal = mysqli_num_rows($qrTotal);
    $totalPagina = ceil($numTotal / $quantidade);
    echo "Total de Registros: {$numTotal} <br>" ;
    echo '<a href= "?menuop=contatos&pagina=1">Primeira Página</a>' . " ";

    if($pagina > 6){
        ?>
        <a href= "?menuop=contatos&pagina=<?php echo $pagina - 1?>"> << </a> 
        <?php
    }

    for ($i = 1; $i <= $totalPagina; $i++) {
       if ($i >= ($pagina - 5) && $i <= ($pagina + 5)){
            if ($i == $pagina) {
                echo $i . " ";
            } else {
                echo "<a href=\"?menuop=contatos&pagina=$i\">$i</a>" . " ";
            }
       }
    }

    if($pagina < ($totalPagina - 5)){
        ?>
            <a href = "?menuop=contatos&pagina=<?php echo $pagina + 1 ?>" >> </a>
        <?php
    }

    echo '<a href= "?menuop=contatos&pagina=1">Última Página Página</a>';

    ?>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</body>

</html>
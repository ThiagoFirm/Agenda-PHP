<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Contatos</title>
</head>

<body>
    <?php
        $txt_pesquisa = (isset($_POST['txt_pesquisa'])) ? $_POST['txt_pesquisa'] : "";
    ?>

    <header>
        <h3><i class="bi bi-person-fill"></i> Contatos</h3>
    </header>

    <div>
        <a class="btn btn-secondary mb-2" href="index.php?menuop=cad-contato"><i class="bi bi-person-plus-fill"></i> Novo Contato</a>
    </div>

    <div>
        <form action="index.php?menuop=contatos" method="post">
            <div class="input-group">
                <input class="col-4" type="text" name="txt_pesquisa" value="<?=$txt_pesquisa ?>">
                <button class="btn btn-primary btn-sm" type="submit"><i class="bi bi-search"></i></button>
            </div>
        </form>
    </div>

    <div class="tabela">
        <table class=" table table-dark table-striped table-hover table-bordered ">
            <thead>
                <tr>
                    <th>
                        <i class="i bi bi-star-fill"></i>
                    </th>
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
            DATE_FORMAT(dataNascContato, '%d/%m/%Y') AS dataNascContato,
            flagFavoritoContato
            FROM tbcontatos WHERE idContato = '{$txt_pesquisa}' OR 
            nomeContato LIKE '%{$txt_pesquisa}%' OR
            DATE_FORMAT(dataNascContato, '%d/%m/%Y') LIKE '%{$txt_pesquisa}%'
            ORDER BY flagFavoritoContato DESC, nomeContato ASC
            LIMIT $inicio, $quantidade
            ";

            $rs = mysqli_query($conexao, $sql) or die("Erro ao executar a consulta!" . mysqli_error($conexao));
            while ($dados = mysqli_fetch_assoc($rs)) {

            ?>

                <tbody>
                    <tr>
                        <td>
                            <?php
                                if($dados["flagFavoritoContato"]==1){
                                    echo "<a href=\"#\" class=\"flagFavoritoContato link-warning\" title=\"Favorito\" id=\"{$dados['idContato']}\">
                                    <i class=\"i bi bi-star-fill\"></i>
                                    </a>";
                                }else{
                                    echo "<a href=\"#\" class=\"flagFavoritoContato link-warning\" title=\" Não favorito\" id=\"{$dados['idContato']}\">
                                    <i class=\"i bi bi-star \"></i>
                                    </a>";
                                }
                            ?>

                        </td>
                        <td><?= $dados["idContato"] ?></td>
                        <td class="text-nowrap"><?= $dados["nomeContato"] ?></td>
                        <td class="text-nowrap"><?= $dados["emailContato"] ?></td>
                        <td class="text-nowrap"><?= $dados["telefoneContato"] ?></td>
                        <td class="text-nowrap"><?= $dados["enderecoContato"] ?></td>
                        <td><?= $dados["sexoContato"] ?></td>
                        <td><?= $dados["dataNascContato"] ?></td> <!-- "< ? = ? >" é outra forma de codar em php  -->
                        <td class="text-center"><a class="btn btn-outline-success btn-sm" href="index.php?menuop=editar-contato&idContato=<?= $dados["idContato"] ?>"><i class="bi bi-pencil-fill"></i></a></td>
                        <td class="text-center"><a class="btn btn-outline-danger btn-sm" href="index.php?menuop=excluir-contato&idContato=<?= $dados["idContato"] ?>"><i class="bi bi-trash3-fill"></i></a></td>
                    </tr>

                <?php
            }
                ?>

                </tbody>
        </table>
    </div>


    <ul class="pagination justify-content-center">

        <?php

        $sqlTotal = "SELECT idContato FROM tbcontatos";
        $qrTotal = mysqli_query($conexao, $sqlTotal) or die(mysqli_error($conexao));
        $numTotal = mysqli_num_rows($qrTotal);
        $totalPagina = ceil($numTotal / $quantidade);
        echo "<li class = 'page-item'><span class= 'page-link'> Total de Registros: {$numTotal} </span></li>";

        echo "<li class= 'page-item'><a class = 'page-link'href= '?menuop=contatos&pagina=1'>Primeira Página</a></li>";

        if ($pagina > 6) {
        ?>

            <li class="page-item"><a class="page-link" href="?menuop=contatos&pagina=<?php echo $pagina - 1 ?>">
                    << </a>
            </li>

        <?php
        }

        for ($i = 1; $i <= $totalPagina; $i++) {
            if ($i >= ($pagina - 5) && $i <= ($pagina + 5)) {
                if ($i == $pagina) {
                    echo "<li class= 'page-item active'><span class= 'page-link'>$i</span></li>";
                } else {
                    echo "<li class= 'page-item'><a class='page-link' href=\"?menuop=contatos&pagina={$i}\">{$i}</a></li> ";
                }
            }
        }

        if ($pagina < ($totalPagina - 5)) {
        ?>
            <li class="page-item"><a class="page-link" href="?menuop=contatos&pagina=<?php echo $pagina + 1 ?>">> </a></li>
        <?php
        }

        echo "<li class='page-item'><a class='page-link' href= '?menuop=contatos&pagina=1'>Última Página Página</a></li>";


        ?>
    </ul>

</body>

</html>
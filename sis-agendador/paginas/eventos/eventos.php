<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Eventos</title>
</head>

<body>
    <?php
        $txt_pesquisa = (isset($_POST['txt_pesquisa'])) ? $_POST['txt_pesquisa'] : "";
    
        //Alterna entre status concluido e nao concluido
        $idEvento=(isset($_GET['idEvento']))?$_GET['idEvento']:"";
        $starusEvento=(isset($_GET['statusEvento'])and $_GET['statusEvento']=='0')?'1':'0';

        $sql = "UPDATE tbeventos SET statusEvento ={$starusEvento} WHERE idEvento={$idEvento}";
        $rs = mysqli_query($conexao, $sql);

    ?>
    


    <header>
        <h3><i class="bi bi-calendar-check-fill"></i> Eventos</h3>
    </header>

    <div>
        <a class="btn btn-secondary mb-2" href="index.php?menuop=cad-evento"><i class="bi bi-calendar-plus-fill"></i> Novo Evento</a>
    </div>

    <div >
        <form action="index.php?menuop=eventos" method="post">
            <div class="input-group">
                <input class="col-3" type="text" name="txt_pesquisa" value="<?=$txt_pesquisa?>">
                <button class="btn btn-primary btn-sm" type="submit"><i class="bi bi-search"></i></button>
            </div>
        </form>
    </div>

    <div class="tabela">
        <table class=" table table-dark table-striped table-hover table-bordered ">
            <thead>
                <tr>
                    
                    <th>Status</th>
                    <th>Título</th>
                    <th>Descrição</th>
                    <th>Data de Início</th>
                    <th>Horário de Início</th>
                    <th>Data de Fim</th>
                    <th>Horário de Fim</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                </tr>
            </thead>


            <?php

            $quantidade = 10;

            $pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1; // "?:" uma forma de simplifica do if em php

            $inicio = ($quantidade * $pagina) - $quantidade;



            $sql = "SELECT
            idEvento, 
            statusEvento,
            tituloEvento,
            descricaoEvento,
            DATE_FORMAT(dataInicioEvento, '%d/%m/%Y') AS dataInicioEvento, horaInicioEvento,
            DATE_FORMAT(dataFimEvento, '%d/%m/%Y') AS dataFimEvento, horaFimEvento
            FROM tbeventos
            WHERE 
            tituloEvento LIKE '%{$txt_pesquisa}%' OR
            descricaoEvento LIKE '%{$txt_pesquisa}%' OR
            DATE_FORMAT(dataInicioEvento, '%d/%m/%Y') LIKE '%{$txt_pesquisa}%'
            ORDER BY statusEvento, dataInicioEvento
            LIMIT $inicio, $quantidade
            ";

            $rs = mysqli_query($conexao, $sql) or die("Erro ao executar a consulta!" . mysqli_error($conexao));
            while ($dados = mysqli_fetch_assoc($rs)) {

            ?>

                <tbody>
                    <tr>
                        <td>
                            <a class="btn btn-secondary btn-sm" href="index.php?menuop=eventos&pagina<?=$pagina?>&idEvento=<?=$dados['idEvento']?>&statusEvento=<?=$dados['statusEvento']?>">
                            <?php
                                if($dados['statusEvento']==0){
                                    echo '<i class="bi bi-square"></i>';
                                }
                                else{
                                    echo '<i class="bi bi-check-square"></i>';
                                }
                            ?>

                            </a>
                        </td>
                        <td class="text-nowrap"><?= $dados["tituloEvento"] ?></td>
                        <td class="text-nowrap"><?= $dados["descricaoEvento"] ?></td>
                        <td class="text-nowrap"><?= $dados["dataInicioEvento"] ?></td>
                        <td class="text-nowrap"><?= $dados["horaInicioEvento"] ?></td>
                        <td class="text-nowrap"><?= $dados["dataFimEvento"] ?></td>
                        <td class="text-nowrap"><?= $dados["horaFimEvento"] ?></td>
                        <td class="text-center">
                            <a class="btn btn-outline-success btn-sm" href="index.php?menuop=editar-evento&idEvento=<?= $dados["idEvento"] ?>"><i class="bi bi-pencil-fill"></i></a>
                        </td>
                        <td class="text-center">
                            <a class="btn btn-outline-danger btn-sm" href="index.php?menuop=excluir-evento&idEvento=<?= $dados["idEvento"] ?>"><i class="bi bi-trash-fill"></i></a>
                        </td>
                    </tr>

                <?php
            }
                ?>

                </tbody>
        </table>
    </div>


    <ul class="pagination justify-content-center">

        <?php

        $sqlTotal = "SELECT idEvento FROM tbeventos";
        $qrTotal = mysqli_query($conexao, $sqlTotal) or die(mysqli_error($conexao));
        $numTotal = mysqli_num_rows($qrTotal);
        $totalPagina = ceil($numTotal / $quantidade);
        echo "<li class = 'page-item'><span class= 'page-link'> Total de Registros: {$numTotal} </span></li>";

        echo "<li class= 'page-item'><a class = 'page-link'href= '?menuop=eventos&pagina=1'>Primeira Página</a></li>";

        if ($pagina > 6) {
        ?>

            <li class="page-item"><a class="page-link" href="?menuop=eventos&pagina=<?php echo $pagina - 1 ?>">
                    << </a>
            </li>

        <?php
        }

        for ($i = 1; $i <= $totalPagina; $i++) {
            if ($i >= ($pagina - 5) && $i <= ($pagina + 5)) {
                if ($i == $pagina) {
                    echo "<li class= 'page-item active'><span class= 'page-link'>$i</span></li>";
                } else {
                    echo "<li class= 'page-item'><a class='page-link' href=\"?menuop=eventos&pagina={$i}\">{$i}</a></li> ";
                }
            }
        }

        if ($pagina < ($totalPagina - 5)) {
        ?>
            <li class="page-item"><a class="page-link" href="?menuop=eventos&pagina=<?php echo $pagina + 1 ?>">> </a></li>
        <?php
        }

        echo "<li class='page-item'><a class='page-link' href= '?menuop=eventos&pagina=1'>Última Página Página</a></li>";


        ?>
    </ul>

</body>

</html>
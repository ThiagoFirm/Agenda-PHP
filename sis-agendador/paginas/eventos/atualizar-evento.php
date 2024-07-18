<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>
        <h3>
            <i class="bi bi-calendar-check-fill"></i> Atualizar Evento
        </h3>
    </header>
    <?php
        $idEvento = strip_tags(mysqli_real_escape_string($conexao, $_POST['idEvento']));
        $tituloEvento = strip_tags(mysqli_real_escape_string($conexao, $_POST['tituloEvento']));
        $descricaoEvento = strip_tags(mysqli_real_escape_string($conexao, $_POST['descricaoEvento']));
        $dataInicioEvento = strip_tags(mysqli_real_escape_string($conexao, $_POST['dataInicioEvento']));
        $horaInicioEvento = strip_tags(mysqli_real_escape_string($conexao, $_POST['horaInicioEvento']));
        $dataFimEvento = strip_tags(mysqli_real_escape_string($conexao, $_POST['dataFimEvento']));
        $horaFimEvento = strip_tags(mysqli_real_escape_string($conexao, $_POST['horaFimEvento']));

        $sql = "UPDATE tbeventos SET
        tituloEvento = '{$tituloEvento}',
        descricaoEvento = '{$descricaoEvento}',
        dataInicioEvento = '{$dataInicioEvento}',
        horaInicioEvento = '{$horaInicioEvento}',
        dataFimEvento = '{$dataFimEvento}',
        horaFimEvento = '{$horaFimEvento}'
        WHERE idEvento = '{$idEvento}'
        ";
        $rs = mysqli_query($conexao, $sql) or die ("Erro ao executar consulta." . mysqli_error($conexao));

        if($rs) { ?>
            <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">Atualizar Evento</h4>
                <p>Evento atualizada com sucesso</p>
                <hr>
                </p class="mb-0">
                <a href="?menuop=eventos">Voltar para a lista de Eventos</a>
                </p>
            </div>
        <?php
        } else {
            ?>
             <div class="alert alert-danger" role="alert">
                <h4 class="alert-heading">Erro.</h4>
                <p>Erro ao atualizar Evento. <?= mysqli_error($conexao)?></p>
                <hr>
                </p class="mb-0">
                <a href="index.php?menuop=eventos">Voltar para a lista de Eventos</a>
                </p>
            </div>
        <?php
        }
    ?>
</body>
</html>
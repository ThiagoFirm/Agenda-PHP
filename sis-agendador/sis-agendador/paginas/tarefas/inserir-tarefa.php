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
        + Inserir Tarefa
        </h3>
    </header>
    <?php
    $tituloTarefa = strip_tags(mysqli_real_escape_string($conexao, $_POST['tituloTarefa']));
    $descricaoTarefa = strip_tags(mysqli_real_escape_string($conexao, $_POST['descricaoTarefa']));
    $dataConclusaoTarefa = strip_tags(mysqli_real_escape_string($conexao, $_POST['dataConclusaoTarefa']));
    $horaConclusaoTarefa = strip_tags(mysqli_real_escape_string($conexao, $_POST['horaConclusaoTarefa']));
    $dataLembreteTarefa = strip_tags(mysqli_real_escape_string($conexao, $_POST['dataLembreteTarefa']));
    $horaLembreteTarefa = strip_tags(mysqli_real_escape_string($conexao, $_POST['horaLembreteTarefa']));
    $recorrenciaTarefa = strip_tags(mysqli_real_escape_string($conexao, $_POST['recorrenciaTarefa']));

    $sql = "INSERT INTO tbtarefas
    (
        tituloTarefa,
        descricaoTarefa,
        dataConclusaoTarefa,
        horaConclusaoTarefa,
        dataLembreteTarefa,
        horaLembreteTarefa,
        recorrenciaTarefa
    )
    VALUES
    (
        '{$tituloTarefa}',
        '{$descricaoTarefa}',
        '{$dataConclusaoTarefa}',
        '{$horaConclusaoTarefa}',
        '{$dataLembreteTarefa}',
        '{$horaLembreteTarefa}',
        '{$recorrenciaTarefa}'
    )
    ";

    $rs = mysqli_query($conexao, $sql);

    if($rs) { ?>
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Inserir Tarefa</h4>
            <p>Tarefa inserida com sucesso</p>
            <hr>
            </p class="mb-0">
            <a href="?menuop=tarefas">Voltar para a lista de tarefas</a>
            </p>
        </div>
    <?php
    } else {
        ?>
         <div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">Erro.</h4>
            <p>Erro ao inserir a tarefa.</p>
            <hr>
            </p class="mb-0">
            <a href="index.php?menuop=tarefas">Voltar para a lista de tarefas</a>
            </p>
        </div>
    <?php
    }

    ?>
</body>

</html>
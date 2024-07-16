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
            Excluir Evento
        </h3>
    </header>

    <?php
    $idEvento = $_GET["idEvento"];

    $sql = "DELETE FROM tbeventos WHERE idEvento = '{$idEvento}'";
    $rs = mysqli_query($conexao, $sql);
    
    if($rs) { ?>
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Excluir Evento</h4>
            <p>Evento excluída com sucesso</p>
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
            <p>Erro ao excluir Evento.</p>
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
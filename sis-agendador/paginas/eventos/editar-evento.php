<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php
    $idEvento = $_GET['idEvento'];

    $sql = "SELECT * FROM tbeventos WHERE idEvento = '$idEvento'";

    $rs = mysqli_query($conexao, $sql) or die ("Erro ao recuperar os dados do registro." . mysqli_error($conexao));
    $dados = mysqli_fetch_assoc($rs);

    ?>

    <header>
        <h3>
        <i class="bi bi-calendar-check-fill"></i> Editar Evento
        </h3>
    </header>

    <div class="col-6">    
        <form class=".needs-validation" action="index.php?menuop=atualizar-evento" method="POST">
            <div class="mb-3 col-3">
                <label for="idEvento" class="form-label">ID</label>
                <input class="form-control" type="text" name="idEvento" id="idEvento" value="<?=$dados["idEvento"]?>" readonly>
            </div>

            <div class="mb-3">
                <label for="tituloEvento" class="form-label">Título</label>
                <input class="form-control" type="text" name="tituloEvento" id="tituloEvento" value="<?=$dados["tituloEvento"]?>">
            </div>

            <div class="mb-3">
                <label for="descricaoEvento" class="form-label">Descrição</label>
                <textarea class="form-control" type="text" cols="30" name="descricaoEvento" id="descricaoEvento" rows="5"><?=$dados["descricaoEvento"]?></textarea>
            </div>

            <div class="row">
                <div class="mb-3 col-4">
                    <label for="dataInicioEvento" class="form-label">Data de Início</label>
                    <input class="form-control" type="date" name="dataInicioEvento" id="dataInicioEvento" value="<?=$dados["dataInicioEvento"]?>">
                </div>

                <div class="mb-3 col-4">
                    <label for="horaInicioEvento" class="form-label">Hora de Início</label>
                    <input class="form-control" type="time" name="horaInicioEvento" id="horaInicioEvento" value="<?=$dados["horaInicioEvento"]?>">
                </div>
                
            <div class="row">
                <div class="mb-3 col-4">
                    <label for="dataFimEvento" class="form-label">Data de Fim</label>
                    <input class="form-control" type="date" name="dataFimEvento" id="dataFimEvento" value="<?=$dados["dataFimEvento"]?>">
                </div>

                <div class="mb-3 col-4">
                    <label for="horaFimEvento" class="form-label">Hora de Fim</label>
                    <input class="form-control" type="time" name="horaFimEvento" id="horaFimEvento" value="<?=$dados["horaFimEvento"]?>">
                </div>
            </div>

            <div class="mb-3">
                    <input class="btn btn-primary" type="submit" value="Atualizar" name="btnAtualizar">
                </div>
            
        </form>
       
    </div>

</body>

</html>
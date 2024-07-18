<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php
    $idTarefa = $_GET['idTarefa'];

    $sql = "SELECT * FROM tbtarefas WHERE idTarefa = '$idTarefa'";

    $rs = mysqli_query($conexao, $sql) or die ("Erro ao recuperar os dados do registro." . mysqli_error($conexao));
    $dados = mysqli_fetch_assoc($rs);

    ?>

    <header>
        <h3>
            <i class="bi bi-list-task"></i> Editar Tarefa
        </h3>
    </header>

    <div class="col-6">    
        <form class=".needs-validation" action="index.php?menuop=atualizar-tarefa" method="POST">
            <div class="mb-3 col-3">
                <label for="idTarefa" class="form-label">ID</label>
                <input class="form-control" type="text" name="idTarefa" id="idTarefa" value="<?=$dados["idTarefa"]?>" readonly>
            </div>

            <div class="mb-3">
                <label for="tituloTarefa" class="form-label">Título</label>
                <input class="form-control" type="text" name="tituloTarefa" id="tituloTarefa" value="<?=$dados["tituloTarefa"]?>">
            </div>

            <div class="mb-3">
                <label for="descricaoTarefa" class="form-label">Descrição</label>
                <textarea class="form-control" type="text" cols="30" name="descricaoTarefa" id="descricaoTarefa" rows="5"><?=$dados["descricaoTarefa"]?></textarea>
            </div>

            <div class="row">
                <div class="mb-3 col-4">
                    <label for="dataConclusaoTarefa" class="form-label">Data de Conclusão</label>
                    <input class="form-control" type="date" name="dataConclusaoTarefa" id="dataConclusaoTarefa" value="<?=$dados["dataConclusaoTarefa"]?>">
                </div>

                <div class="mb-3 col-4">
                    <label for="horaConclusaoTarefa" class="form-label">Hora de Conclusão</label>
                    <input class="form-control" type="time" name="horaConclusaoTarefa" id="horaConclusaoTarefa" value="<?=$dados["horaConclusaoTarefa"]?>">
                </div>
                
            <div class="row">
                <div class="mb-3 col-4">
                    <label for="dataLembreteTarefa" class="form-label">Data de Lembrete</label>
                    <input class="form-control" type="date" name="dataLembreteTarefa" id="dataLembreteTarefa" value="<?=$dados["dataLembreteTarefa"]?>">
                </div>

                <div class="mb-3 col-4">
                    <label for="horaLembreteTarefa" class="form-label">Hora de Lembrete</label>
                    <input class="form-control" type="time" name="horaLembreteTarefa" id="horaLembreteTarefa" value="<?=$dados["horaLembreteTarefa"]?>">
                </div>
            </div>

            <div class="row">
                <div class="mb-3 col-4">
                    <label for="recorrenciaTarefa" class="form-label">Recorrência</label>
                    <select name="recorrenciaTarefa" id="recorrenciaTarefa" class="form-select" >
                    <option value="0"<?php echo ($dados["recorrenciaTarefa"] == 0) ? "selected": "" ?> >Não Recorrente</option>
                    <option value="1"<?php echo ($dados["recorrenciaTarefa"] == 1) ? "selected": "" ?> >Diariamente</option>
                    <option value="2"<?php echo ($dados["recorrenciaTarefa"] == 2) ? "selected": "" ?> >Semanalmente</option>
                    <option value="3"<?php echo ($dados["recorrenciaTarefa"] == 3) ? "selected": "" ?> >Mensalmente</option>
                    <option value="4"<?php echo ($dados["recorrenciaTarefa"] == 4) ? "selected": "" ?> >Anualmente</option>
                    </select>
                </div>
            </div>

            <div class="mb-3">
                    <input class="btn btn-primary" type="submit" value="Atualizar" name="btnAtualizar">
                </div>
            
        </form>
       
    </div>

</body>

</html>
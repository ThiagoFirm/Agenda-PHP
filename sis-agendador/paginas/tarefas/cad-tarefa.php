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
            <i class="bi bi-list-task"></i> Cadastro de Tarefa
        </h3>
    </header>

    <div class="col-6">
        <form class="needs-validation" action="index.php?menuop=inserir-tarefa" method="POST" novalidate>
            <div class="mb-3">
                <label for="tituloTarefa" class="form-label">Título</label>
                <input class="form-control" type="text" name="tituloTarefa" id="tituloTarefa" required>
                <div class="valid-feedback">
                    Correto.
                </div>
                <div class="invalid-feedback">
                    Campo obrigatório de no máximo 225 caracteres
                </div>
            </div>

            <div class="mb-3">
                <label for="descricaoTarefa" class="form-label">Descrição</label>
                <textarea class="form-control" type="text" cols="30" name="descricaoTarefa" id="descricaoTarefa" rows="5"></textarea>
            </div>

            <div class="row">
                <div class="mb-3 col-4">
                    <label for="dataConclusaoTarefa" class="form-label">Data de Conclusão</label>
                    <input class="form-control" type="date" name="dataConclusaoTarefa" id="dataConclusaoTarefa">
                </div>

                <div class="mb-3 col-4">
                    <label for="horaConclusaoTarefa" class="form-label">Hora de Conclusão</label>
                    <input class="form-control" type="time" name="horaConclusaoTarefa" id="horaConclusaoTarefa">
                </div>

                <div class="row">
                    <div class="mb-3 col-4">
                        <label for="dataLembreteTarefa" class="form-label">Data de Lembrete</label>
                        <input class="form-control" type="date" name="dataLembreteTarefa" id="dataLembreteTarefa">
                    </div>

                    <div class="mb-3 col-4">
                        <label for="horaLembreteTarefa" class="form-label">Hora de Lembrete</label>
                        <input class="form-control" type="time" name="horaLembreteTarefa" id="horaLembreteTarefa">
                    </div>
                </div>

                <div class="row">
                    <div class="mb-3 col-4">
                        <label for="recorrenciaTarefa" class="form-label">Recorrência</label>
                        <select name="recorrenciaTarefa" id="recorrenciaTarefa" class="form-select">
                            <option value="0">Não Recorrente</option>
                            <option value="1">Diariamente</option>
                            <option value="2">Semanalmente</option>
                            <option value="3">Mensalmente</option>
                            <option value="4">Anualmente</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <input class="btn btn-primary" type="submit" value="Adicionar" name="btnAdicionar">
                </div>

        </form>

    </div>

</body>

</html>
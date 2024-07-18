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
            <i class="bi bi-calendar-plus-fill"></i> Cadastro de Evento
        </h3>
    </header>

    <div class="col-6">
        <form class="needs-validation" action="index.php?menuop=inserir-evento" method="POST" novalidate>
            <div class="mb-3">
                <label for="tituloEvento" class="form-label">Título</label>
                <input class="form-control" type="text" name="tituloEvento" id="tituloEvento" required>
                <div class="valid-feedback">
                    Correto.
                </div>
                <div class="invalid-feedback">
                    Campo obrigatório de no máximo 225 caracteres
                </div>
            </div>

            <div class="mb-3">
                <label for="descricaoEvento" class="form-label">Descrição</label>
                <textarea class="form-control" type="text" cols="30" name="descricaoEvento" id="descricaoEvento" rows="5"></textarea>
            </div>

            <div class="row">
                <div class="mb-3 col-4">
                    <label for="dataInicioEvento" class="form-label">Data de Início</label>
                    <input class="form-control" type="date" name="dataInicioEvento" id="dataInicioEvento">
                </div>

                <div class="mb-3 col-4">
                    <label for="horaInicioEvento" class="form-label">Hora de Início</label>
                    <input class="form-control" type="time" name="horaInicioEvento" id="horaInicioEvento">
                </div>

                <div class="row">
                    <div class="mb-3 col-4">
                        <label for="dataFimEvento" class="form-label">Data de Fim</label>
                        <input class="form-control" type="date" name="dataFimEvento" id="dataFimEvento">
                    </div>

                    <div class="mb-3 col-4">
                        <label for="horaFimEvento" class="form-label">Hora de Fim</label>
                        <input class="form-control" type="time" name="horaFimEvento" id="horaFimEvento">
                    </div>
                </div>

                <div class="mb-3">
                    <input class="btn btn-primary" type="submit" value="Adicionar" name="btnAdicionar">
                </div>

        </form>

    </div>

</body>

</html>
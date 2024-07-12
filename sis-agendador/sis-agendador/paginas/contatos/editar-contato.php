<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php

    $idContato = $_GET["idContato"];

    $sql = "SELECT * FROM tbcontatos WHERE idContato = {$idContato} ";
    $rs = mysqli_query($conexao, $sql) or die("Erro ao recuperar os dados do registro." . mysqli_error($conexao));
    $dados = mysqli_fetch_assoc($rs);

    ?>

    <header>
        <h3>Editar Contato</h3>
    </header>

    <div class="col-6">
        <form action="index.php?menuop=atualizar-contato" method="POST">
            <div class="mb-3 col-3">
                <label for="idContato">ID</label>
                <div class="input-group">
                    <span class="input-group-text">#</span>
                    <input class="form-control" type="text" name="idContato" value="<?= $dados["idContato"] ?>" readonly>
                </div>
            </div>

            <div class="mb-3">
                <label for="nomeContato">Nome</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person-square"></i></span>
                    <input class="form-control" type="text" name="nomeContato" value="<?= $dados["nomeContato"] ?>">
                </div>
            </div>

            <div class="mb-3">
                <label for="emailContato">E-mail</label>
                <div class="input-group">
                    <span class="input-group-text">@</span>
                    <input class="form-control" type="email" name="emailContato" value="<?= $dados["emailContato"] ?>">
                </div>
            </div>

            <div class="mb-3">
                <label for="telefoneContato">Telefone</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-telephone"></i></span>
                    <input class="form-control" type="text" name="telefoneContato" value="<?= $dados["telefoneContato"] ?>">
                </div>
            </div>

            <div class="mb-3">
                <label for="enderecoContato">Endereço</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-mailbox-flag"></i></span>
                    <input class="form-control" type="text" name="enderecoContato" value="<?= $dados["enderecoContato"] ?>">
                </div>
            </div>

            <div class="row mb-3">
                <div class="mb-3 col-6">
                    <label for="sexoContato">Sexo</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-gender-ambiguous"></i></span>
                        <select class="form-select" name="sexoContato" id="sexoContato">
                            <option <?php echo ($dados['sexoContato'] == '') ? 'selected' : '' ?> value="">Selecione o sexo do contato</option>
                            <option <?php echo ($dados['sexoContato'] == 'M') ? 'selected' : '' ?> value="M">Masculino</option>
                            <option <?php echo ($dados['sexoContato'] == 'F') ? 'selected' : '' ?> value="F">Feminino</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3 col-3">
                    <label for="dataNascContato">Data de Nascimento</label>
                    <div class="input-group">

                        <input class="form-control" type="date" name="dataNascContato" value="<?= $dados["dataNascContato"] ?>">
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <input class="btn btn-success" type="submit" value="Atualizar" name="btnAtualizar">
            </div>

        </form>
    </div>

</body>

</html>
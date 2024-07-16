<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <header>
        <h3>Cadastro de Contato</h3>
        </heade>
        <div class="col-6">
            <form class=".needs-validation" action="index.php?menuop=inserir-contato" method="POST" >

                <div class="mb-3">
                    <label class="form-label" for="nomeContato">Nome</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-person-square"></i></span>
                        <input class="form-control" type="text" name="nomeContato" required>
                        <div class="valid-feedback">
                        Correto.
                        </div>
                        <div class="invalid-feedback">
                        Campo obrigatório de no máximo 225 caracteres 
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="emailContato">E-mail</label>
                    <div class="input-group">
                        <span class="input-group-text">@</span>
                        <input class="form-control" type="email" name="emailContato">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="telefoneContato">Telefone</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-telephone"></i></span>
                        <input class="form-control" type="text" name="telefoneContato">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="enderecoContato">Endereço</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-mailbox-flag"></i></span>
                        <input class="form-control" type="text" name="enderecoContato">
                    </div>
                </div>

                <div class="row">

                    <div class="mb-3 col-6">
                        <label class="form-label" for="sexoContato">Sexo</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-gender-ambiguous"></i></span>
                            <select class="form-select" name="sexoContato" id="sexoContato">
                                <option selected>Selecione o sexo do contato</option>
                                <option value="M">Masculino</option>
                                <option value="F">Feminino</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3 col-3">
                        <label class="form-label" for="dataNascContato">Data de Nascimento</label>
                        <div class="input-group">
                            <input class="form-control" type="date" name="dataNascContato">
                        </div>
                    </div>

                </div>


                <div class="mb-3">
                    <input class="btn btn-primary" type="submit" value="Adicionar" name="btnAdicionar">
                </div>

            </form>
        </div>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <header>
        <h3>Inserir Contato</h3>
    </header>
    <?php


    $nomeContato = strip_tags(mysqli_real_escape_string($conexao, $_POST["nomeContato"]));
    $emailContato = strip_tags(mysqli_real_escape_string($conexao, $_POST["emailContato"]));
    $telefoneContato = strip_tags(mysqli_real_escape_string($conexao, $_POST["telefoneContato"]));
    $enderecoContato = strip_tags(mysqli_real_escape_string($conexao, $_POST["enderecoContato"]));
    $sexoContato = strip_tags(mysqli_real_escape_string($conexao, $_POST["sexoContato"]));
    $dataNascContato = strip_tags(mysqli_real_escape_string($conexao, $_POST["dataNascContato"]));

    $sql = "INSERT INTO tbcontatos(nomeContato, emailContato, telefoneContato, enderecoContato, sexoContato, dataNascContato)
        VALUE('{$nomeContato}', '{$emailContato}', '{$telefoneContato}', '{$enderecoContato}', '{$sexoContato}', '{$dataNascContato}')";
    $rs = mysqli_query($conexao, $sql) or die("Erro ao executar a consulta." . mysqli_error($conexao));

    echo "O registro foi inserido com sucesso !"

    ?>
</body>

</html>
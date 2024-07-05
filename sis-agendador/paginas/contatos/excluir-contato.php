<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    
<?php
    $idContato = mysqli_real_escape_string($conexao, $_GET["idContato"]);
    $sql = "DELETE FROM tbcontatos WHERE idContato = '{$idContato}'";
    $rs = mysqli_query($conexao, $sql) or die ("Erro ao excluir o registro. " . mysqli_error($conexao));
    echo "Registro excluído com sucesso!";
    
    ?>

    <header>
        <h3>Excluir Contato</h3>
    <header>


</body>

</html>
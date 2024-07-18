<?php
// Conexão com o banco de dados
include "db/conexao.php";
$msg_error = "";

if (isset($_POST["loginUser"]) && isset($_POST["senhaUser"])) {
    $loginUser = mysqli_real_escape_string($conexao, $_POST['loginUser']);
    $senhaUser = $_POST['senhaUser']; // Pegue a senha sem hashing aqui

    // Prepare a consulta para evitar SQL Injection
    if ($stmt = $conexao->prepare("SELECT * FROM tbususarios WHERE loginUser = ?")) {
        $stmt->bind_param("s", $loginUser);
        $stmt->execute();
        $result = $stmt->get_result();
        $dados = $result->fetch_assoc();

        // Verifique a senha usando password_verify
        if ($dados && password_verify($senhaUser, $dados['senhaUser'])) {
            session_start();
            $_SESSION["loginUser"] = $loginUser;
            $_SESSION["nomeUser"] = $dados["nomeUser"];

            header('Location: index.php');
            exit();
        } else {
            $msg_error = "<div class='alert alert-danger mt-3'>
                              <p>Usuário não encontrado ou a senha não confere.</p>
                          </div>";
        }
        $stmt->close();
    } else {
        // Erro na preparação da consulta
        $msg_error = "<div class='alert alert-danger mt-3'>
                          <p>Erro na consulta: " . $conexao->error . "</p>
                      </div>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Login - Agenda</title>
</head>
<body class="bg-secondary">
    <div class="container">
        <div class="row vh-100 align-items-center justify-content-center">
            <div class="col-10 col-sm-8 col-md-6 col-lg-4 p-4 bg-white shadow rounded">
                <div class="row justify-content-center fw-bold fs-2 mb-3">
                    Login
                </div>
                <form class="needs-validation" action="" method="post" novalidate>
                    <div class="form-group mb-3">
                        <label for="loginUser" class="form-label">Login</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-person"></i>
                            </span>
                            <input type="text" name="loginUser" id="loginUser" class="form-control" required>
                            <div class="invalid-feedback">
                                Informe o login.
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="senhaUser" class="form-label">Senha</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-key"></i>
                            </span>
                            <input type="password" name="senhaUser" id="senhaUser" class="form-control" required>
                            <div class="invalid-feedback">
                                Informe a senha.
                            </div>
                        </div>
                        <?php
                            echo $msg_error;
                        ?>
                    </div>
                    <button class="btn btn-success w-100">Entrar</button>
                </form>
            </div>
        </div>
    </div>
    <script src="js/validation.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

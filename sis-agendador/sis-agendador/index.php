<?php
include("db/conexao.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/estilo-padrao.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <title>Sistema Agendador</title>
</head>

<body>
    <header class="bg-dark">
        <div class="container">
            
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                
                <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
                    <h1>Agenda</h1>
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item "><a class="nav-link active" href="index.php?menuop=home">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="index.php?menuop=contatos">Contatos</a></li>
                        <li class="nav-item"><a class="nav-link" href="index.php?menuop=eventos">Eventos</a></li>
                        <li class="nav-item"><a class="nav-link" href="index.php?menuop=tarefas">Tarefas</a></li>
                    </ul>
                </div>

            </nav>

        </div>
    </header>

    <main>
        <div class="container">
            <?php

            $menuop = (isset($_GET['menuop'])) ? $_GET["menuop"] : "home";
            switch ($menuop) {
                case 'home':
                    include("paginas/home/home.php");
                    break;

                case 'contatos':
                    include("paginas/contatos/contatos.php");
                    break;

                case 'cad-contato':
                    include("paginas/contatos/cad-contato.php");
                    break;

                case 'inserir-contato':
                    include("paginas/contatos/inserir-contato.php");
                    break;

                case 'editar-contato':
                    include("paginas/contatos/editar-contato.php");
                    break;

                case 'atualizar-contato':
                    include("paginas/contatos/atualizar-contato.php");
                    break;

                case 'excluir-contato':
                    include("paginas/contatos/excluir-contato.php");
                    break;

                case 'tarefas':
                    include("paginas/tarefas/tarefas.php");
                    break;

                case 'eventos':
                    include("paginas/eventos/eventos.php");
                    break;

                default:
                    include("paginas/home/home.php");
                    break;
            }
            ?>
        </div>
    </main>

    <!--<footer class="container-fluid  bg-dark">
        <div class="text-center">Agenda</div>
    </footer>-->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="./js/validation.js"></script>
    <script src="js/javascript-agendador.js"></script>
</body>



</html>
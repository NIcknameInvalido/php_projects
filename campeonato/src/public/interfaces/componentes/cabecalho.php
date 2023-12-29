<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</head>

<body>
    <header class="header">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <a class="navbar-brand" href="#">Navbar</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav  navbar-nav-scroll">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home <span class="sr-only">(página atual)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <button class="btn btn-dark btt-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            Times
                        </button>
                        <ul class="dropdown-menu dropdown-menu-dark">
                            <li><a class="dropdown-item" href="../controles/cadastrar_times.php">Cadastrar times</a></li>
                            <li><a class="dropdown-item" href="../controles/exibir_times.php">Exibir times</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <button class="btn btn-dark btt-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            Jogadores
                        </button>
                        <ul class="dropdown-menu dropdown-menu-dark">
                            <li><a class="dropdown-item" href="../controles/cadastrar_jogadores.php">Cadastrar jogadores</a></li>
                            <li><a class="dropdown-item" href="../controles/exibir_jogadores.php">Gerenciar jogadores</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <button class="btn btn-dark btt-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            Campeonatos
                        </button>
                        <ul class="dropdown-menu dropdown-menu-dark">
                            <li><a class="dropdown-item" href="../controles/cadastrar_campeonato.php">Cadastrar campeonato</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <button class="btn btn-dark btt-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            Jogos e resultados
                        </button>
                        <ul class="dropdown-menu dropdown-menu-dark">
                            <li><a class="dropdown-item" href="../controles/cadastrar_jogos.php">Cadastrar jogos</a></li>
                            <li><a class="dropdown-item" href="../controles/exibir_jogos.php">Registrar resultados</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <main class="content d-flex align-items-center justify-content-center px-5">
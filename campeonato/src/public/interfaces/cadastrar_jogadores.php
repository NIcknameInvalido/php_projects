<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Campeonato</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .h400 {
            height: 400px;
        }

        .h100 {
            height: 100px;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Meu Site</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Sobre</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contato</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Conteúdo Principal -->
    <div class="container mt-4">
        <h1>Cadastro de jogadores</h1>

        <!-- Formulário com 5 Inputs de Texto -->
        <div class="col-lg-12"> 
            <form action="../controles/jogadores.php" method="post">
                <div class="form-group row">
                    <div class="col">
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome">
                    </div>
                    <div class="col">
                        <label for="cpf">Número de CPF</label>
                        <input type="text" class="form-control" id="cpf" name="cpf" placeholder="cpf">
                    </div>
                </div>
                <div class="form-group row mt-5">
                    <div class="col">
                        <label for="apelido">Apelido</label>
                        <input type="text" class="form-control" id="apelido" name = "apelido" placeholder="Apelido">
                    </div> 
                    <div class="col">
                        <label for="dt_nascimento">Data Nascimento</label>
                        <input type="date" class="form-control" id="dt_nascimento" name="dt_nascimento" placeholder="DD/MM/AAAA">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Cadastrar</button>
            </form>
        </div> 
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-light text-center p-3 fixed-bottom">
        <p>&copy; 2023 Minha Página. Todos os direitos reservados.</p>
    </footer>

    <!-- Adicione o link para o JavaScript do Bootstrap (opcional, mas pode ser necessário para alguns componentes) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
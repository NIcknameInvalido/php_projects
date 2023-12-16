<?php require('cabecalho.php') ?>
<main>
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
</main>
<?php include('rodape.php') ?> 

    
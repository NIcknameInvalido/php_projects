<?php require('cabecalho.php') ?>
<form class="content d-flex align-items-center px-5" action="../controles/cadastrar_jogadores.php" method="post">
    <div class="container mt-4">
        <h1>Cadastro de jogadores</h1>
        <div class="col"> 
            <form action="../controles/jogadores.php" method="post">
                <div class="form-group row">
                    <div class="col">
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome">
                    </div>
                    <div class="col">
                        <label for="cpf">Número de CPF</label>
                        <input type="text" class="form-control" id="cpf" name="cpf" placeholder="CPF">
                    </div>
                </div>
                <div class="form-group row mt-5">
                    <div class="col">
                        <label for="apelido">Apelido</label>
                        <input type="text" class="form-control" id="apelido" name="apelido" placeholder="Apelido">
                    </div> 
                    <div class="col">
                        <label for="dt_nascimento">Data Nascimento</label>
                        <input type="date" class="form-control" id="dt_nascimento" name="dt_nascimento" placeholder="DD/MM/AAAA">
                    </div>
                </div>
                <div class="form-group row mt-5">
                    <div class="col">
                        <label for="times">Times</label>
                        <select class="form-select" id="times" name="id_time">
                            <option value="0" selected>Selecione um Time</option>
                            <?php foreach($times as $arr => $time): ?>
                                <option value="<?= $time->id ?>"><?=$time->nome?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col">
                        <label for="dt_inicio">Data de início</label>
                        <input type="date" class="form-control" id="dt_inicio" name="dt_inicio" placeholder="DD/MM/AAAA">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Cadastrar</button>
            </form>
        </div> 
    </div>
</form>
<?php include('rodape.php') ?>

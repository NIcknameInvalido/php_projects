<?php require('componentes/cabecalho.php') ?>
<form class="shadow-lg col-xl-6 d-flex align-items-center px-5" action="../controles/cadastrar_jogadores.php" method="post">
    <div class="container mt-4">
        <h1 class="">Cadastro de jogadores</h1>
        <div class="col">
                <div class="row">
                    <div class="col-12 col-md-6 col-xl-3">
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" value="<?= isset($_POST['nome']) ? $_POST['nome'] : "" ?>">
                    </div>
                    <div class="col-12 col-md-6 col-xl-3">
                        <label for="sobrenome">Sobrenome</label>
                        <input type="text" class="form-control" id="sobrenome" name="sobrenome" placeholder="Sobrenome" value="<?= isset($_POST['sobrenome']) ? $_POST['sobrenome'] : "" ?>">
                    </div>
                    <div class="col-12 col-md-6 col-xl-3">
                        <label for="cpf">CPF</label>
                        <input type="text" class="form-control" id="cpf" name="cpf" placeholder="CPF" value="<?= isset($_POST['cpf']) ? $_POST['cpf'] : "" ?>">
                    </div>
                    <div class="col-12 col-md-6 col-xl-3">
                        <label for="dt_nascimento">Data Nascimento</label>
                        <input type="date" class="form-control" id="dt_nascimento" name="dt_nascimento" placeholder="DD/MM/AAAA" value="<?= isset($_POST['dt_nascimento']) ? $_POST['dt_nascimento'] : "" ?>">
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-xl-8 col-sm-8">
                        <label for="times">Times</label>
                        <select class="form-select" id="times" name="timeId">
                            <option value="0" selected>Selecione um Time</option>
                            <?php foreach ($times as $arr => $time) : ?>
                                <option value="<?= $time->id ?>"><?= $time->nome."(".$time->sigla.")" ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-xl-4 col-sm-4">
                        <label for="dt_inicio">Data de início</label>
                        <input type="date" class="form-control" id="dt_inicio" name="dt_inicio" placeholder="DD/MM/AAAA" value="<?= isset($_POST['dt_inicio']) ? $_POST['dt_inicio'] : "" ?>">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-3 mb-5">Cadastrar</button>
        </div>
    </div>
</form>
<?php include('componentes/rodape.php') ?>
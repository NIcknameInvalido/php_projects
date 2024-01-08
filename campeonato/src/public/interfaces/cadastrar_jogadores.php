
<form class="shadow-lg col-xl-6 d-flex align-items-center px-5" action="index.php" method="post">
    <input type="hidden" name="route" value="cadastrar_jogadores.php">
    <div class="container mt-4">
        <h1 class="">Cadastro de jogadores</h1>
        <div class="col">
            <div class="row">
                <div class="col-12 col-md-6 col-xl-3">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control <?= isset($errors['nome']) ? 'is-invalid' : '' ?>" id="nome" name="nome" placeholder="Nome" value="<?= isset($_POST['nome']) ? $_POST['nome'] : "" ?>">
                    <?php if (isset($errors['nome'])) : ?>
                    <div class="invalid-feedback">
                        <?= $errors['nome'] ?>
                    </div>
                <?php endif ?>
                </div>
            
                <div class="col-12 col-md-6 col-xl-3">
                    <label for="sobrenome">Sobrenome</label>
                    <input type="text" class="form-control <?= isset($errors['sobrenome']) ? 'is-invalid' : '' ?>" id="sobrenome" name="sobrenome" placeholder="Sobrenome" value="<?= isset($_POST['sobrenome']) ? $_POST['sobrenome'] : "" ?>">
                    <?php if (isset($errors['sobrenome'])) : ?>
                        <div class="invalid-feedback">
                            <?= $errors['sobrenome'] ?>
                        </div>
                    <?php endif ?>
                </div>
                <div class="col-12 col-md-6 col-xl-3">
                    <label for="cpf">CPF</label>
                    <input type="text" class="form-control <?= isset($errors['cpf']) ? 'is-invalid' : '' ?>" id="cpf" name="cpf" placeholder="CPF" value="<?= isset($_POST['cpf']) ? $_POST['cpf'] : "" ?>">
                    <?php if (isset($errors['cpf'])) : ?>
                        <div class="invalid-feedback">
                            <?= $errors['cpf'] ?>
                        </div>
                    <?php endif ?>
                </div>
                <div class="col-12 col-md-6 col-xl-3">
                    <label for="dt_nascimento">Data Nascimento</label>
                    <input type="date" class="form-control <?= isset($errors['dt_nascimento']) ? 'is-invalid' : '' ?>" id="dt_nascimento" name="dt_nascimento" placeholder="DD/MM/AAAA" value="<?= isset($_POST['dt_nascimento']) ? $_POST['dt_nascimento'] : "" ?>">
                    <?php if (isset($errors['dt_nascimento'])) : ?>
                        <div class="invalid-feedback">
                            <?= $errors['dt_nascimento'] ?>
                        </div>
                    <?php endif ?>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-xl-8 col-sm-8">
                    <label for="times">Times</label>
                    <select class="form-select" id="times" name="timeId">
                        <option value="0" selected>Selecione um Time</option>
                        <?php foreach ($times as $arr => $time) : ?>
                            <option value="<?= $time->id ?>"><?= $time->nome . "(" . $time->sigla . ")" ?></option>
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
<?php require('componentes/cabecalho.php') ?>
<div class="container-fluid">
    <form class="shadow-lg col-12 col-md-6 mx-auto my-5 p-5" action="../controles/cadastrar_jogos.php" method="post">
        <div class="row mb-3">
            <div class="form-group col-12">
                <label for="select1" class="form-label fs-5 text-dark">Campeonato</label>
                <select id="select1" class="form-select form-select-lg" aria-label="Selecione Opção 1" name="id_edicao">
                    <option selected>Abra para selecionar o campeonato</option>
                    <?php foreach ($campeonatos as $edicao) : ?>
                        <option value="<?= $edicao->id ?>"><?= $edicao->nome . " (" . $edicao->ano_edicao . ")" ?></option>
                    <?php endforeach ?>
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <div class="form-group col-12 col-xl-4">
                <label for="select2" class="form-label fs-5 text-dark">Time da casa</label>
                <select id="select2" class="form-select form-select-lg" aria-label="Selecione Opção 2" name="id_time_casa">
                    <option selected>Selecione o time da casa</option>
                    <?php foreach ($times as $time) : ?>
                        <option value="<?= $time->id ?>"><?= $time->nome . " (" . $time->sigla . ")" ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="form-group col-12 col-xl-3">
                <label for="dataInput" class="form-label fs-5 text-dark">Escolha uma data</label>
                <input type="date" class="form-control form-select-lg" id="dataInput" name="dt_jogo">
            </div>
            <div class="form-group col-12 col-xl-4">
                <label for="select3" class="form-label fs-5 text-dark">Selecione o time visitante</label>
                <select id="select3" class="form-select form-select-lg" aria-label="Selecione Opção 3" name="id_time_visitante">
                    <option selected>Selecione o time visitante</option>
                    <?php foreach ($times as $time) : ?>
                        <option value="<?= $time->id ?>"><?= $time->nome . " (" . $time->sigla . ")" ?></option>
                    <?php endforeach ?>
                </select>
            </div>
        </div>
        <div class="row mb-3">
        </div>
        <div class="row">
            <div class="col-12">
                <button type="submit" class="btn-lg btn-primary mt-3">Enviar</button>
            </div>
        </div>
    </form>
</div>
<script>
    var jogoId = <?php echo isset($jogo_id) && $jogo_id > 0 ? $jogo_id : 0; ?>;
    if (jogoId > 0) {
        window.alert(`Jogo número ${jogoId} cadastrado com sucesso`);
    }
</script>
<?php require('componentes/rodape.php') ?>
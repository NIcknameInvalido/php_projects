<?php require('componentes/cabecalho.php') ?>
<div class="col-xl-8 col-lg-12">
    <div class="row">
        <?php foreach ($partidas as $partida) : ?>
            <div class="col-lg-12 col-xl-6 ">
                <form class="d-flex justify-content-center" action="../controles/salvar_resultados.php" method="post">
                    <div class="col-xl-12 col-lg-6 mt-2">
                        <div class="card text-bg-dark">
                            <h4 class="card-header"><?= $partida->nome_campeonato . " (" . $partida->ano_edicao . ") - " . $partida->dt_jogo?></h4>
                            <div class="card-body">
                                <input type="hidden" name="id_jogo" value="<?= $partida->id_jogo ?>">
                                <div class="card-title row">
                                    <div class="col">
                                        <h5><label for="sigla"><?= $partida->nome_time_casa ?></label></h5>
                                        <input type="number" class="form-control" id="gols_pro" name="gols_pro" placeholder="0" value="<?=$partida->gols_pro?>" <?= $partida->resultado == false ? '' : 'readonly' ?>>
                                        <input type="hidden" name="id_time_casa" value="<?= $partida->id_time_casa ?>">
                                    </div>
                                    <div class="col">
                                        <h5><label for="gols_contra"><?= $partida->nome_time_visitante ?></label></h5>
                                        <input type="number" class="form-control" id="gols_contra" name="gols_contra" placeholder="0" value="<?=$partida->gols_contra?>" <?= $partida->resultado == false ? '' : 'readonly' ?>>
                                        <input type="hidden" name="id_time_visitante" value="<?= $partida->id_time_visitante ?>">
                                    </div>
                                </div>
                                <button class="btn btn-sm btn-success">Registrar Resultados</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        <?php endforeach ?>
    </div>
</div>
<?php require('componentes/rodape.php') ?>
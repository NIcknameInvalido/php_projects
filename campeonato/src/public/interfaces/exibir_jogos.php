<?php require('componentes/cabecalho.php') ?>
<div class="d-flex">
    <div class="row">
        <?php foreach($partidas as $partida): ?>
            <div class="col-3 mt-2">
                <div class="card text-bg-dark me-2">
                    <h5 class="card-header"><?= $partida->dt_jogo ?></h5>
                    <div class="card-body">
                        <h5 class="card-title"><?= $partida->nome_time_casa ?> X <?= $partida->nome_time_visitante ?></h5>
                        <a href="#" class="btn btn-sm btn-success">Registrar Resultados</a>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>


<?php require('componentes/rodape.php') ?>
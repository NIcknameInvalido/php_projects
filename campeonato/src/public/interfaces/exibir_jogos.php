<div class="col-xl-8 col-lg-12">
    <div class="row">
        <div class="form-group col-12">
            <label for="select1" class="form-label fs-5 text-dark">Campeonato</label>
            <select id="select1" class="form-select form-select-lg" aria-label="Selecione Opção 1" name="id_edicao" onchange="atualizarURL()">
                <option value="0">Abra para selecionar o campeonato</option>
                <?php foreach ($camps as $edicao) : ?>
                    <option value="<?= $edicao->id ?>" <?= ($_GET['id_edicao'] ?? '') == $edicao->id ? 'selected' : '' ?>>
                        <?= $edicao->nome . " (" . $edicao->ano_edicao . ")" ?>
                    </option>
                <?php endforeach ?>
            </select>
        </div>
    </div>
    <?php if (isset($_GET['id_edicao']) && count($partidas) > 0) : ?>
        <div class="row">
            <?php foreach ($partidas as $partida) : ?>
                <div class="col-lg-12 col-xl-6 ">
                    <form class="d-flex justify-content-center" action="../controles/salvar_resultados.php" method="post">
                        <div class="col-xl-12 col-lg-6 mt-2">
                            <div class="card text-bg-dark">
                                <h4 class="card-header"><?= $partida->nome_campeonato . " (" . $partida->ano_edicao . ") - " . $partida->dt_jogo ?></h4>
                                <div class="card-body">
                                    <input type="hidden" name="id_jogo" value="<?= $partida->id_jogo ?>">
                                    <div class="card-title row">
                                        <div class="col">
                                            <h5><label for="sigla"><?= $partida->nome_time_casa ?></label></h5>
                                            <input type="number" class="form-control" id="gols_pro" name="gols_pro" placeholder="0" value="<?= $partida->gols_pro ?>" <?= $partida->resultado == false ? '' : 'readonly' ?>>
                                            <input type="hidden" name="id_time_casa" value="<?= $partida->id_time_casa ?>">
                                        </div>
                                        <div class="col">
                                            <h5><label for="gols_contra"><?= $partida->nome_time_visitante ?></label></h5>
                                            <input type="number" class="form-control" id="gols_contra" name="gols_contra" placeholder="0" value="<?= $partida->gols_contra ?>" <?= $partida->resultado == false ? '' : 'readonly' ?>>
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
        <div class="row mt-2">
            <nav aria-label="Page navigation">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="exibir_jogos.php?id_edicao=<?= $_GET['id_edicao'] ?>&pagina=<?= $paginacao->paginaAtual - 1 ?>">Anterior</a></li>
                    <?php for ($i = $paginacao->limiteInicial; $i <= $paginacao->limiteFinal; $i++) : ?>
                        <li class="page-item"><a class="page-link" href="exibir_jogos.php?id_edicao=<?= $_GET['id_edicao'] ?>&pagina=<?= $i ?>"><?= $i ?></a></li>
                    <?php endfor ?>
                    <li class="page-item"><a class="page-link" href="exibir_jogos.php?id_edicao=<?= $_GET['id_edicao'] ?>&pagina=<?= $paginacao->paginaAtual + 1 ?>">Próximo</a></li>
                </ul>
            </nav>
        </div>
    <?php endif ?>
    <?php if ((isset($_GET['id_edicao']) && $_GET['id_edicao'] > 0)  && count($partidas) == 0): ?>
        <div class="alert alert-info mt-2" role="alert">
            Não há registros de jogos para este campeonato.
        </div>
    <?php endif ?>
</div>
<script>
    function atualizarURL() {
        var select = document.getElementById("select1");
        var selectedValue = select.value;

        // Remover o atributo 'selected' de todas as opções
        var options = select.getElementsByTagName('option');
        for (var i = 0; i < options.length; i++) {
            options[i].removeAttribute('selected');
        }

        // Adicionar o atributo 'selected' à opção selecionada
        var selectedOption = select.querySelector('option[value="' + selectedValue + '"]');
        if (selectedOption) {
            selectedOption.setAttribute('selected', 'selected');
        }

        var novaURL = window.location.href.split('?')[0] + '?id_edicao=' + selectedValue;
        window.location.href = novaURL;
        console.log(novaURL);
    }
</script>
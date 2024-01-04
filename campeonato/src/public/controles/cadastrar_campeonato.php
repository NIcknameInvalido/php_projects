<?php
include('../configuracoes/config.php');


$exception = NULL;
$edicoes_campeonato = [];
$edicoes = Edicao::selectAll();

foreach ($edicoes as $edicao) {
    $campeonato = Campeonato::selectOne(['id' => $edicao->id_campeonato]);
    array_push($edicoes_campeonato, [
        'id_campeonato' => $edicao->id_campeonato,
        'nome_campeonato' => $campeonato->nome,
        'ano_edicao' => $edicao->ano_edicao,
        'dt_inicio' => $edicao->dt_inicio,
        'dt_fim' => $edicao->dt_fim
    ]);
}
if ($_POST) {
    try {
        $camp = new Campeonato(["nome" => $_POST['nome']]);
        $camp->save();
    } catch (ValidationException $e) {
        $exception =  $e->getErrors();
    }
    if ($camp->id > 0) {
        try {
            $edicao = new Edicao();
            $edicao->ano_edicao = $_POST['ano_edicao'];
            $edicao->dt_inicio = $_POST['dt_inicio'];
            $edicao->dt_fim = $_POST['dt_fim'];
            $edicao->id_campeonato = $camp->id;
            $edicao->save();
        } catch (ValidationException $e) {
            is_null($exception) ? $exception = $e->getErrors() : array_merge($exception, $e->getErrors());
        }
    }

    if ($_GET) {
        try {
            $edicao = new Edicao();
            $edicao->ano_edicao = $_GET['ed_ano_edicao'];
            $edicao->dt_inicio = $_GET['ed_dt_inicio'];
            $edicao->dt_fim = $_GET['ed_dt_fim'];
            $edicao->id_campeonato = $_GET['ed_id_campeonato'];
            $edicao->save();
        } catch (ValidationException $e) {
            array_merge($exception, $e->getErrors());
        }
    }
}

return carregarInterface('cadastrar_campeonato', ['edicoes_campeonato' => $edicoes_campeonato, 'errors' => $exception]);

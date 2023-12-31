<?php
include('../configuracoes/config.php');

function carregarEdicaoCampeonato()
{
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
    return carregarInterface('cadastrar_campeonato', ['edicoes_campeonato' => $edicoes_campeonato]);
}


function cadastrar_campeonato_edicao()
{
    $camp = new Campeonato(["nome" => $_POST['nome']]);
    $camp->save();
    if ($camp->id > 0) {
        $edicao = new Edicao();
        $edicao->ano_edicao = $_POST['ano_edicao'];
        $edicao->dt_inicio = $_POST['dt_inicio'];
        $edicao->dt_fim = $_POST['dt_fim'];
        $edicao->id_campeonato = $camp->id;
        $edicao->save(); {
            if ($edicao->id > 0) {
                unset($_POST);
            }
        }
    }
    carregarEdicaoCampeonato();
}

function cadastrar_nova_edicao()
{
    $edicao = new Edicao();

    $edicao->ano_edicao = $_GET['ed_ano_edicao'];
    $edicao->dt_inicio = $_GET['ed_dt_inicio'];
    $edicao->dt_fim = $_GET['ed_dt_fim'];
    $edicao->id_campeonato = $_GET['ed_id_campeonato'];

    $edicao->save();
    unset($_GET);
    carregarEdicaoCampeonato();
}

if (isset($_POST) && count($_POST) > 0) {
    cadastrar_campeonato_edicao();
} elseif (isset($_GET) && count($_GET) > 0) {
    cadastrar_nova_edicao();
}else{
    carregarEdicaoCampeonato();
}
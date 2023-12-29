<?php 
    include('../configuracoes/config.php');

    function carregarTimesCampeonato($params = []){
        $times = Time::selectAll();
        $CampeonatoEdicao = CampeonatoEdicao::selectAllFromJoin('Campeonato', ['Campeonato' => ['nome'], 'Edicao'=> ['id','ano_edicao', 'dt_inicio', 'dt_fim', 'id_campeonato']], 
            ['Edicao' => ['Campeonato.id' => 'Edicao.id_campeonato']]);
        if(isset($_POST) && count($_POST)){
            $jogo_id = cadastrar_jogos();
            unset($_POST);
            return carregarInterface('cadastrar_jogos', ['times' => $times, 'campeonatos' => $CampeonatoEdicao, 'jogo_id' => $jogo_id]);
        }else{
            unset($_POST);
            return carregarInterface('cadastrar_jogos', ['times' => $times, 'campeonatos' => $CampeonatoEdicao]);
        }
    }
    function cadastrar_jogos(){
        $jogo = new Jogo();
        $jogo->id_edicao = $_POST['id_edicao'];
        $jogo->id_time_visitante = $_POST['id_time_visitante'];
        $jogo->id_time_casa = $_POST['id_time_casa'];
        $jogo->dt_jogo = $_POST['dt_jogo'];
        $jogo->save();
        return $jogo->id;
    }
    carregarTimesCampeonato();
?>
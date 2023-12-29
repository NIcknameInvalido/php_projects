<?php
    include('../configuracoes/config.php');
    function carregarPartida(){
        $jogos = Jogo::selectAll();
        $partidas = [];
        
        foreach ($jogos as $jogo) {
            $partida = new Partida();
            $time_casa = Time::selectOne(['id' => $jogo->id_time_casa]);
            $time_visitante = Time::selectOne(['id' => $jogo->id_time_visitante]);
            $camp =  CampeonatoEdicao::selectOneFromJoin('Campeonato', ['Campeonato' => ['nome'], 'Edicao'=> ['id','ano_edicao', 'dt_inicio', 'dt_fim', 'id_campeonato']], 
            ['Edicao' => ['Campeonato.id' => 'Edicao.id_campeonato']], ['Edicao.id' => $jogo->id_edicao]);
            $resultado = Resultado::selectOne(['id_jogo' => $jogo->id, 'id_time' => $time_casa->id]);
            
            /*Atribuição para partidas*/
            $partida->id_jogo = $jogo->id;
            $partida->nome_campeonato = $camp->nome;
            #time casa
            $partida->nome_time_casa = $time_casa->nome;
            $partida->id_time_casa = $time_casa->id;
            $partida->gols_pro = isset($resultado) ? $resultado->gols_pro : 0;
            #time visitante
            $partida->nome_time_visitante = $time_visitante->nome;
            $partida->id_time_visitante = $time_visitante->id;
            $partida->gols_contra = isset($resultado) ? $resultado->gols_contra : 0;
            #campeonato
            $partida->dt_jogo = $jogo->dt_jogo;
            $partida->ano_edicao = $camp->ano_edicao;
            $partida->resultado = isset($resultado);
            array_push($partidas, $partida);

        }

        return carregarInterface('exibir_jogos', ['partidas' => $partidas]);
    }

    carregarPartida();
?>


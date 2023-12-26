<?php
    include('../configuracoes/config.php');
    function carregarPartida(){
        $jogos = Jogo::selectAll();
        $partidas = [];
        foreach ($jogos as $jogo) {
            $partida = new Partida();
            $time_casa = Time::selectOne(['id' => $jogo->id_time_casa]);
            $time_visitante = Time::selectOne(['id' => $jogo->id_time_visitante]);
            $partida->id_jogo = $jogo->id;
            $partida->nome_time_casa = $time_casa->nome;
            $partida->nome_time_visitante = $time_visitante->nome;
            $partida->dt_jogo = $jogo->dt_jogo;

            array_push($partidas, $partida);
        }

        return carregarInterface('exibir_jogos', ['partidas' => $partidas]);
    }

    carregarPartida();
?>


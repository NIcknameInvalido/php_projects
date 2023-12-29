<?php 
    class Partida extends Modelo{
        protected static $colunas = [
            'id_jogo',
            'nome_campeonato',
            'nome_time_casa',
            'id_time_casa',
            'gols_pro',
            'nome_time_visitante',
            'id_time_visitante',
            'gols_contra',
            'dt_jogo',
            'ano_edicao',
            'resultado'
        ];
    }
?>
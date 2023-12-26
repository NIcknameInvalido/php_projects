<?php 
    Class Jogo extends Modelo {
        protected static $colunas = [
            'id',
            'id_edicao',
            'id_time_visitante',
            'id_time_casa',
            'dt_jogo'
        ];

        protected static $nome_tabela = 'Jogo';
    }
?>
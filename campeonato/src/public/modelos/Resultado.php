<?php 
    Class Resultado extends Modelo{
        protected static $colunas = [
            'id',
            'gols_time_casa',
            'gols_time_visitante',
            'id_jogo',
        ];

        protected static $nome_tabela = 'Resultado';
    }
?>
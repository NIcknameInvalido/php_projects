<?php 
    Class Resultado extends Modelo{
        protected static $colunas = [
            'id',
            'gols_pro',
            'gols_contra',
            'id_jogo',
            'id_time'
        ];

        protected static $nome_tabela = 'Resultado';
    }
?>
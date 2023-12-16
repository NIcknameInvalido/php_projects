<?php 
    
    class Time extends Modelo{
        protected static $colunas = [
            'id',
            'nome',
            'sigla',
            'ano_fundacao'
        ];

        protected static $nome_tabela = 'Time';
    }
?>
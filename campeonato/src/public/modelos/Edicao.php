<?php 
    Class Edicao extends Modelo{
        protected static $colunas = [
            'id',
            'ano_edicao',
            'dt_inicio',
            'dt_fim',
            'id_campeonato'
        ];

        protected static $nome_tabela = 'Edicao';
    }
?>
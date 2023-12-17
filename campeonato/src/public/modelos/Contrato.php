<?php 
    class Contrato extends Modelo{
        protected static $colunas = [
            'id',
            'dt_inicio',
            'dt_fim',
            'id_jogador',
            'id_time'
        ];
        protected static $nome_tabela = 'Contrato';
    }
?>
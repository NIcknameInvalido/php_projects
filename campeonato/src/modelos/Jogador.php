<?php
    class Jogador extends Modelo{
        protected static $colunas = [
            'id', 
            'nome',
            'cpf',
            'idade', 
            'apelido',
            'dt_nascimento'
        ];
        protected static $nome_tabela = 'Jogador';
    }
?>
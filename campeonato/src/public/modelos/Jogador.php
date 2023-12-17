<?php
    class Jogador extends Modelo{
        protected static $colunas = [
            'id', 
            'nome',
            'sobrenome',
            'cpf',
            'dt_nascimento'
        ];
        protected static $nome_tabela = 'Jogador';
    }
?>
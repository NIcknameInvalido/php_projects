<?php 
    class Usuario extends Modelo{
        protected static $colunas = [
            'id',
            'email',
            'senha',
            'isAdmin'
        ];

        protected static $nome_tabela = 'Usuario';
    }

?>
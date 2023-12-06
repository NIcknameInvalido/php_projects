<?php

    class Banco{
        public static function conectarAoBanco(){
            $caminho = realpath(dirname(__FILE__) . '/../env.ini');
            $configuracoes = parse_ini_file($caminho);
            $sql_conn = new mysqli($configuracoes['host'],$configuracoes['username'], $configuracoes['password'], $configuracoes['dbname']);
            if($sql_conn->connect_error){
                die("Erro: " . $sql_conn->connect_error);
            }
            return $sql_conn;
        }

        public static function executarSql($sql){
            try {
                $sql_conn = static::conectarAoBanco();
                return $sql_conn->query($sql);
            } catch (Exception $excp) {
                return $excp->getMessage();
            }
        }
    }

?>
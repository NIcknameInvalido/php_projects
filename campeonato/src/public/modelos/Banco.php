<?php
    class Banco{
        public static function conectarAoBanco(){
            $caminho = dirname(realpath('../modelos/'))."/env.ini";
            $configuracoes = parse_ini_file($caminho);
            $sql_conn = new mysqli($configuracoes['host'],$configuracoes['username'], $configuracoes['password'], $configuracoes['dbname']);
            if($sql_conn->connect_error){
                die("Erro: " . $sql_conn->connect_error);
            }
            return $sql_conn;
        }

        public static function obterResultadoDoSql($sql){
            try {
                $sql_conn = static::conectarAoBanco();
                $resultado = $sql_conn->query($sql);
                $sql_conn->close();
                return $resultado;
            } catch (Exception $excp) {
                return $excp->getMessage();
            }
        }

        public static function executarSql($sql){
            $sql_conn = static::conectarAoBanco();
            if(!mysqli_query($sql_conn, $sql)){
                throw new Exception((mysqli_error($sql_conn)));
            }
            $id = $sql_conn->insert_id;
            $sql_conn->close();
            return $id;
        }
    }

?>
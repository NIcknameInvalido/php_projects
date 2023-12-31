<?php
class Banco
{
    private static function conectarAoBanco()
    {
        $caminho = dirname(realpath('../modelos/')) . "/env.ini";
        $configuracoes = parse_ini_file($caminho);
        $sql_conn = new mysqli($configuracoes['host'], $configuracoes['username'], $configuracoes['password'], $configuracoes['dbname']);
        if ($sql_conn->connect_error) {
            die("Erro: " . $sql_conn->connect_error);
        }
        return $sql_conn;
    }

    public static function obterResultadoDoSql($sql)
    {
        try {
            $sql_conn = static::conectarAoBanco();
            $resultado = $sql_conn->query($sql);
            $sql_conn->close();
            return $resultado;
        } catch (Exception $excp) {
            return $excp->getMessage();
        }
    }

    public static function insert($sql, $valores)
    {
        try {
            $sql_conn = static::conectarAoBanco();
            $stmt = $sql_conn->prepare($sql);
            $valores = array_values($valores);
            $tipos = '';
            echo $sql . "<br>";
            foreach ($valores as $valor) {
                if (is_int($valor)) {
                    $tipos .= "i"; // inteiro
                } elseif (is_double($valor)) {
                    $tipos .= "d"; // double
                } elseif (is_string($valor)) {
                    $tipos .= "s"; // string
                } else {
                    die("Tipo de parâmetro não suportado.");
                }
            }
            $stmt->bind_param($tipos, ...$valores);
            $stmt->execute();
            $id = $sql_conn->insert_id;
            $stmt->close();

            $sql_conn->close();
            return $id;
        } catch (ValidationException $e) {
            return $e->getMessage();
        }
    }
}

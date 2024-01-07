<?php
class Modelo
{
    protected static $nome_tabela = '';
    protected static $colunas = [];
    protected  $valores = [];

    function __construct($arr = [])
    {
        $this->obterValoresDeArray($arr);
    }

    public function obterValoresDeArray($arr)
    {
        if ($arr) {
            foreach ($arr as $chave => $valores) {
                $this->$chave = $valores;
            }
        } else {
            foreach (static::$colunas as $chave) {
                $this->$chave = "";
            }
        }
    }

    //métodos mágicos
    public function __get($chave)
    {
        return $this->valores[$chave];
    }

    public function __set($chave, $valor)
    {
        $this->valores[$chave] = $valor;
    }
    public function getColunas()
    {
        return static::$colunas;
    }
    public static function limparFiltros($filtros)
    {
        $colunasDiferentes = array_diff(array_keys($filtros), static::$colunas);
        foreach ($colunasDiferentes as $col) {
            unset($filtros[$col]);
        }
        return $filtros;
    }

    public static function selectAll($colunas = "*", $filtros = [])
    {
        $obejtos = [];
        $resultado = static::select($filtros, $colunas);

        if ($resultado) {
            $class = get_called_class();
            while ($linha = $resultado->fetch_assoc()) {
                array_push($obejtos, new $class($linha));
            }
        }
        return $obejtos;
    }
    public static function selectOne($filtros, $colunas = "*")
    {
        $resultado = static::select(static::limparFiltros($filtros), $colunas);
        if ($resultado->num_rows == 1) {
            $class = get_called_class();
            $objeto = new $class($resultado->fetch_assoc());
            return $objeto;
        }
    }

    //função para construir um select simples
    public static function select($filtros = [], $colunas = "*")
    {
        $sql = "SELECT ";
        if ($colunas === "*") {
            $sql .= $colunas;
        } else {
            foreach ($colunas as $col) {
                $sql .= $col . ",";
            }
            $sql[strlen($sql) - 1] = " ";
        }
        $sql .= " FROM " . static::$nome_tabela;
        if ($filtros) {
            $sql .= static::formatarFiltros($filtros);
        }
        $resultados = Banco::find($sql);

        return $resultados;
    }
    //função para construir um select avançado e obter resultados
    public static function selectOneFromJoin($nome_tabela_principal, $tabelas_colunas, $joins, $filtros = [])
    {
        $resultado = static::selectFromJoin($nome_tabela_principal, $tabelas_colunas, $joins, $filtros);
        if ($resultado->num_rows == 1) {
            $class = get_called_class();
            $objeto = new $class($resultado->fetch_assoc());
            return $objeto;
        }
    }
    public static function selectAllFromJoin($nome_tabela_principal, $tabelas_colunas, $joins, $filtros = [])
    {
        $obejtos = [];
        $resultado = static::selectFromJoin($nome_tabela_principal, $tabelas_colunas, $joins, $filtros);

        if ($resultado) {
            $class = get_called_class();
            while ($linha = $resultado->fetch_assoc()) {
                array_push($obejtos, new $class($linha));
            }
        }
        return $obejtos;
    }

    /*contrução da query para fazer select com innerJoin()*/
    public static function selectFromJoin($nome_tabela_principal, $tabelas_colunas, $joins, $filtros = [])
    {
        $sql = "SELECT ";
        if (count($tabelas_colunas) > 1) {
            foreach ($tabelas_colunas as $tabela => $colunas) {
                foreach ($colunas as $coluna) {
                    $sql .= $tabela . "." . $coluna . ",";
                }
            }
            $sql[strlen($sql) - 1] = " ";
            $sql .= "FROM " . $nome_tabela_principal;
            foreach ($joins as $tab => $join) {
                $sql .= " INNER JOIN " . $tab . static::join($join);
            }
        } else {
            return "Colunas insuficientes para realizar consultas";
        }
        if (count($filtros) > 0) {
            $sql .= static::formatarFiltros($filtros);
        }
        $resultados = Banco::find($sql);
    
        return $resultados;
    }
    public static function join($joins)
    {
        $join="";
        foreach ($joins as $ch => $val) {
            $join .= " ON " . $ch . "=" . $val;
        }
        return $join;
    }

    #Funções de DML
    public function save()
    {
        $sql = "INSERT INTO " . static::$nome_tabela .
            " (" . implode(",", array_slice(static::$colunas,1)) . ")" . " VALUES ( ";
        foreach (array_slice(static::$colunas,1) as $col) {
            $sql .= '?' . ",";
        }
        $sql[strlen($sql) - 1] = ")";
        try {
            $this->id = Banco::insert($sql, $this->valores);
            return $this->id;
        } catch (Exception $excp) {
            return $excp->getMessage();
        }
    }
    //funcação para formatar os filtros
    public static function formatarFiltros($filtros)
    {
        $filtro_formatado = " WHERE ";
        $contador = 0;
        foreach ($filtros as $chave => $valor) {
            if ($contador > 0) {
                $filtro_formatado .= " AND " . $chave . "=" . static::formatarValor($valor);
            } else {
                $filtro_formatado .= $chave . "=" . static::formatarValor($valor);
            }
            $contador++;
        }
        return $filtro_formatado;
    }
    /*formatação de valores para query do SQL*/
    public static function formatarValor($valor)
    {
        if (!is_numeric($valor) && $valor != "NULL") {
            return "'" . $valor . "'";
        }
        return $valor;
    }

    public function delete($filtros){
        if(count($filtros) < 1){
            throw new Exception("para fazer deleções é necessário filtros");
        }else{
            $sql = 'DELETE FROM '. static::$nome_tabela.static::formatarFiltros($filtros);
            return Banco::delete($sql);
        }
    }
}

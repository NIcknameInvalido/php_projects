<?php
    class Modelo {
        protected static $nome_tabela = '';
        protected static $colunas = [];
        protected  $valores = [];

        function __construct($arr = []){
            $this->loadFromArray($arr);
        }

        public function loadFromArray($arr){
            if($arr){
                foreach ($arr as $chave => $valores) {
                    $this->$chave = $valores;
                }
                
            }
        }

        //métodos mágicos
        public function __get($chave){
            return $this->valores[$chave];
        }
        
        public function __set($chave, $valor){
            $this->valores[$chave] = $valor;
        }
        public function getColunasT(){
            return static::$colunas;
        }
        
        public static function obterTodosRegistros($colunas = "*"){
            $obejtos = [];
            $filtros = [];
            $resultado = static::obterDeUmSelect($filtros, $colunas);

            if($resultado){
                $class = get_called_class();
                while($linha = $resultado->fetch_assoc()){
                    array_push($obejtos, new $class($linha));
                }
            }
            return $obejtos;
        }
        public static function obterRegistroUnico($filtros, $colunas = "*"){
            $obejto = [];
            $resultado = static::obterDeUmSelect($filtros, $colunas);

            if($resultado){
                $class = get_called_class();
                while($linha = $resultado->fetch_assoc()){
                    array_push($obejto, new $class($linha));
                }
            }
            
            return $obejto;
        }
        //função para construir um select simples
        public static function obterDeUmSelect($filtros = [], $colunas = "*"){
            $sql = "SELECT ";
            if($colunas === "*"){
                $sql .= $colunas;
            }else{
                foreach($colunas as $col){
                    $sql .= $col.",";
                }
                $sql[strlen($sql) - 1] = " ";
            }
            $sql .= " FROM ". static::$nome_tabela;
            if($filtros){
                $sql.= static::formatarFiltros($filtros);
            }
            $resultados = Banco::obterResultadoDoSql($sql);
            return $resultados; 
        }




        public function insertInto(){
            $insert = "INSERT INTO ".static::$nome_tabela .
            " (" . implode(",", static::$colunas).")" . " VALUES ( ";
            
            $this->id = 0;
            foreach(static::$colunas as $col){
                $insert.= static::formatarValor($this->$col).",";
            }
            $insert[strlen($insert) - 1] = ")";
            
            try{
                Banco::executarSql($insert);
            }catch(Exception $excp){
                echo $excp->getMessage();
            }
        }
        //funcação para formatar os filtros
        public static function formatarFiltros($filtros){
            $filtro_formatado = " WHERE ";
            $contador = 0;
            foreach($filtros as $chave => $valor){
                if($contador == 0){
                    $filtro_formatado .= $chave . "=" . static::formatarValor($valor);
                }else{
                    $filtro_formatado .= " AND ".$chave . "=" . static::formatarValor($valor);
                }
                $contador++;
            }
            return $filtro_formatado;
        }

        public static function formatarValor($valor){
            if(!is_numeric($valor)){
                return "'".$valor."'";
            }
            return $valor;
        }
    }
?>
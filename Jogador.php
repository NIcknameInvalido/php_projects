<?php 
    class Model {
        protected static $nome_tabela = '';
        protected static $colunas = [];
        protected  $valores = [];

        function __construct($arr){
            $this->loadFromArray($arr);
        }

        public function loadFromArray($arr){
            if($arr){
                foreach ($arr as $index => $valores) {
                    $this->$index = $valores;
                }
            }
        }
        public function __get($index){
            return $this->valores[$index];
        }
        
        public function __set($index, $valor){
            $this->valores[$index] = $valor;
        }

        public static function obterDeUmSelect(){
            $sql = "SELECT ";
            foreach (static::$colunas as $col){
                $sql .= $col.",";
            }
            $sql[strlen($sql) - 1] = " ";
            $sql .= "FROM ". static::$nome_tabela;

            echo $sql;
        }


        public fun

    }


    class Jogador extends Model {
        protected static $colunas = [
            'id', 
            'nome', 
            'idade', 
            'apelido'
        ];
        protected static $nome_tabela = 'Jogador';


        public function obterJogador($jogador) {
            
        }
    }
    
   

    /*conexão com o banco de dados */

    $servername = "127.0.0.1:3309";
    $username = "dev_nikollas";
    $password = "n0v4s3nh4";
    $dbname = "campeonato";

    $jogador = new Jogador(['nome' => "marcos"]);

    $jogador::obterDeUmSelect();

  

    // $conn = new mysqli($servername,$username,$password,$dbname);
    
    

    // if($conn->connect_error){
    //     die("Conexão falhou: ". $coon->connect_error);
    // }
    // try {
    //     // $result = $conn->query("SELECT * FROM Jogador");
    //     // $jogador = new Jogador($result->fetch_assoc());
    //     // echo $jogador->id;
    // } catch (Exception $e) {
    //     echo $e->getMessage();
    // }
    

    
?>
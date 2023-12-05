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
    }
    

    
    class Jogador extends Model {
        protected static $colunas = [
            'id', 
            'nome', 
            'idade', 
            'apelido'
        ];
        protected static $nome_tabela = 'Jogador';


        public function cadastrarJogador($jogador) {
            
        }
    }

    

    $jogador = new Jogador(['nome' => 'ronaldinho', 'idade' => 20]);


    /*conexão com o banco de dados */

    $servername = "127.0.0.1:3308";
    $username = "root";
    $password = "root";
    $dbname = "campeonato";

    $conn = new mysqli($servername,$username,$password,$dbname);
    
    

    if($conn->connect_error){
        die("Conexão falhou: ". $coon->connect_error);
    }

    try {
        $result = $conn->query("SELECT * FROM Jogador");
        print_r($result->fetch_assoc());
    } catch (Exception $e) {
        echo $e->getMessage();
    }
    

    
?>
<?php
    // error_reporting(E_ALL);
    // ini_set('display_errors', 1);
    require_once('Modelo.php');
    class Jogador extends Modelo{
        protected static $colunas = [
            'id', 
            'nome', 
            'idade', 
            'apelido'
        ];
        protected static $nome_tabela = 'Jogador';


        public static function obterJogador($filtros = []) {
            return $resultado = static::obterDeUmSelect($filtros);
        }
    }
    



        $res = Jogador::obterTodosRegistros();

        foreach ($res as $key => $value) {
            echo $value->nome . " ". $value->idade . '<br>';
        }

        
    
            

    
    /*conexão com o banco de dados */


    // $jogador = new Jogador(['n;ome' => "marcos"]);

    // $jogador::obterDeUmSelect(['id' => 1]);

    // echo " 'jogador'";



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
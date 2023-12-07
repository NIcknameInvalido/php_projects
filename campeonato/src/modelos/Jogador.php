<?php
    require_once('Modelo.php');
    class Jogador extends Modelo{
        protected static $colunas = [
            'id', 
            'nome',
            'cpf',
            'idade', 
            'apelido',
            'dt_nascimento'
        ];
        protected static $nome_tabela = 'Jogador';
    }
    



        // $res = Jogador::obterTodosRegistros();

        // foreach ($res as $key => $value) {
        //     echo $value->nome . " ". $value->idade . '<br>';
        // }

        
        $res = new Jogador(['nome' => 'Erling Braut Haaland','cpf' => '111111111','idade' => 20,'apelido' => 'halandinho','dt_nascimento' => '2000-07-21']);
        echo $res->insertInto();
    
        $res::obterTodosRegistros();

    /*conexão com o banco de dados */


    // $jogador = new Jogador(['n;ome' => 'marcos"]);

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
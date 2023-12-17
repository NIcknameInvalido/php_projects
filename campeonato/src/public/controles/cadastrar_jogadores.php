<?php
    include('../configuracoes/config.php');
    
    $times = Time::obterTodosRegistros();
    
    // if($_POST){
    //     $jogador = new Jogador($_POST);
    //     print_r($jogador);
        
    // }
    
    // if(count($_POST) > 0){
    //     foreach($_POST as $value){
    //         echo $value." ". gettype($value);
    //     }
    // }
    
    if(isset($_POST)){
        $jogadorId = 0;
        if(isset($_POST['timeId']) > 0 && isset($_POST['dt_inicio'])){
            $contrato = "";
            $jogador = new Jogador([
               'nome' => $_POST['nome'], 'cpf' => $_POST['cpf'], 
                'apelido' => $_POST['apelido'], 'dt_nascimento' => $_POST['dt_nascimento']
            ]);
            if(isset($jogador)){
                $jogadorId = $jogador->insertInto();
                $arrTemp = ['id' => "NULL", 'dt_inicio' => $_POST['dt_inicio'],'dt_fim' => "NULL",
                'id_jogador' => $jogadorId, 'id_time' => $_POST['timeId']];
                $contrato = new Contrato($arrTemp);
                $contrato->insertInto();
            }else{
                 echo "Error";
            }
        }
    }
    carregarInterface('cadastrar_jogadores', ['times'=> $times]);
?>
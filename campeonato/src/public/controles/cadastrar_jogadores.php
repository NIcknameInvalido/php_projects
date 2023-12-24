<?php
    include('../configuracoes/config.php');
    
    $times = Time::selectAll();

    if(isset($_POST)){
        $jogadorId = 0;
        if(isset($_POST['timeId']) > 0 && isset($_POST['dt_inicio'])){
            $contrato = "";
            $jogador = new Jogador([
               'nome' => $_POST['nome'], 'sobrenome' => $_POST['sobrenome'], 'cpf' => $_POST['cpf'], 
                 'dt_nascimento' => $_POST['dt_nascimento']
            ]);
            if(isset($jogador)){
                $jogadorId = $jogador->save();
                $arrTemp = ['id' => "NULL", 'dt_inicio' => $_POST['dt_inicio'],'dt_fim' => "NULL",
                'id_jogador' => $jogadorId, 'id_time' => $_POST['timeId']];
                $contrato = new Contrato($arrTemp);
                $contrato->save();
            }else{
                 echo "Error";
            }
        }
    }
    carregarInterface('cadastrar_jogadores', ['times'=> $times]);
?>
<?php
    include('../configuracoes/config.php');
    $exception = NULL;
    $times = Time::selectAll();

    if(isset($_POST)){
        if(isset($_POST['timeId']) > 0 && isset($_POST['dt_inicio'])){
            try {
                $jogador = new Jogador([
                    'nome' => $_POST['nome'], 'sobrenome' => $_POST['sobrenome'], 'cpf' => $_POST['cpf'], 
                      'dt_nascimento' => $_POST['dt_nascimento']
                 ]);

                 $jogador->save();
            } catch (ValidationException $e) {
                $exception = $e->getErrors();
            }
            if(isset($jogador->id)){
                $arrTemp = ['id' => "NULL", 'dt_inicio' => $_POST['dt_inicio'],'dt_fim' => "NULL",
                'id_jogador' => $jogadorId, 'id_time' => $_POST['timeId']];
                $cofntrato = new Contrato($arrTemp);
                $contrato->save();
            }else{
                 var_dump($exception);
            }
        }
    }
    carregarInterface('cadastrar_jogadores', ['times'=> $times, 'errors' => $exception]);
?>
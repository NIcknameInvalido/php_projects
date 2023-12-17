<?php  
    include('../configuracoes/config.php');
   
    $jogadores_contrato = [];
    $contratos = Contrato::obterTodosRegistros();

    foreach ($contratos as $indice => $contrato){
        $jogador = Jogador::obterRegistroUnico(['id'=>$contrato->id_jogador]);
        $time = Time::obterRegistroUnico(['id'=>$contrato->id_time]);

        array_push($jogadores_contrato, ['id' => $jogador->id, 'id_contrato' => $contrato->id, 
            'nome' => $jogador->nome ." ".$jogador->sobrenome,
            'id_time' => $time->id,
            'time' => $time->nome,
            'dt_inicio' => $contrato->dt_inicio, 
            'dt_fim' => $contrato->dt_fim, 
            ]);
    }
    carregarInterface('exibir_jogadores', ['jogadores' => $jogadores_contrato]);
?>
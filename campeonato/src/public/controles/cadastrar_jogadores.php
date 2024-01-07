<?php
$exception = NULL;

carregarModelos('Time');
carregarModelos('Jogador');
carregarModelos('Contrato');

$times = Time::selectAll();

if ($_POST) {
    try {
        $jogador = new Jogador([
            'nome' => $_POST['nome'], 'sobrenome' => $_POST['sobrenome'], 'cpf' => $_POST['cpf'],
            'dt_nascimento' => $_POST['dt_nascimento']
        ]);
        $jogador->save();
    } catch (ValidationException $e) {
        $exception = $e->getErrors();
    }
    if (isset($jogador->id)) {
        try {
            $contrato = new Contrato([
                'dt_inicio' => $_POST['dt_inicio'], 'dt_fim' => "NULL",
                'id_jogador' => $jogador->id, 'id_time' => $_POST['timeId']
            ]);
            $contrato->save();
        } catch (ValidationException $e) {
            if (!is_null($exception)) {
                array_merge($exception, $e->getErrors());
            }
        }
    }
}
carregarTemplateInterface('cadastrar_jogadores', ['times' => $times, 'errors' => $exception]);

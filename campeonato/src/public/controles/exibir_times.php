<? 
    include('../configuracoes/config.php');
    $erro = "Chegou aqui";
    $times = Time::obterTodosRegistros();
    carregarInterface('exibir_times', ['times' => $times]);
?>
<? 
    include('../configuracoes/config.php');
    $erro = "Chegou aqui";
    $times = Time::selectAll();
    carregarInterface('exibir_times', ['times' => $times]);
?>
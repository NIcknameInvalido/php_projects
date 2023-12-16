<? 
    include('../configuracoes/config.php');
    
    $time = Time::obterTodosRegistros();
    carregarInterface('exibir_times', ['times' => $time]);
?>
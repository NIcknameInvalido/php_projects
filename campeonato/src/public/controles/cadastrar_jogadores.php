<?php 
    include('../configuracoes/config.php');
    $times = Time::obterTodosRegistros();
    
    // if($_POST){
    //     $jogador = new Jogador($_POST);
    //     print_r($jogador);
        
    // }
    carregarInterface('cadastrar_jogadores', ['times'=> $times]);
?>
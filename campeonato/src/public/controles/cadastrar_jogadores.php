<?php 
    include('../configuracoes/config.php');
    
    carregarInterface('cadastrar_jogadores');

    if($_POST){
        $jogador = new Jogador($_POST);
        print_r($jogador);
    }else{
        echo "A comunicação falhou";
    }
?>
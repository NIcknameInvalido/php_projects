<?php 
    include('../configuracoes/config.php');

    if($_POST){
        $jogador = new Jogador($_POST);

        print_r($jogador);
    }else{
        echo "A comunicação falhou";
    }
    
?>
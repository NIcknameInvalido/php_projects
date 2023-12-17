<?php
    include('../configuracoes/config.php');
    $dados = [];
    if($_POST){
        $time = new Time($_POST);
        $timeId = $time->insertInto();
        if($timeId){
            $timeTeste = Time::obterRegistroUnico(['id'=>$timeId]);
            $dados = ['id' => $timeId];
            header("Location: exibir_times.php");
        }
    }
    carregarInterface('cadastrar_times', $dados);
    exit();
?>
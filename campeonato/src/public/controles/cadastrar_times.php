<?php
    include('../configuracoes/config.php');
    $dados = [];
    if($_POST){
        $time = new Time($_POST);
        $timeId = $time->save();
        if($timeId){
            $timeTeste = Time::selectAll(['id'=>$timeId]);
            $dados = ['id' => $timeId];
            header("Location: exibir_times.php");
        }
    }
    carregarInterface('cadastrar_times', $dados);
    exit();
?>
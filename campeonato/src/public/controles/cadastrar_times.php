<?php
    include('../configuracoes/config.php');
    $exception = NULL;
    
    if($_POST){
        try {
            $time = new Time($_POST);
            $time->save();     
        } catch (ValidationException $e) {
            $exception = $e->getErrors();
        }   
    }
    
    
    carregarInterface('cadastrar_times', ['errors'=> $exception]);
    exit();
?>
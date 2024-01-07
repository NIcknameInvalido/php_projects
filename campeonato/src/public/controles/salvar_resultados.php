<?php 
    include('../configuracoes/config.php');

    function salvarResultados(){

        $resultado_time_casa = new Resultado();
        $resultado_time_casa->id_jogo = $_POST['id_jogo'];
        $resultado_time_casa->gols_pro = $_POST['gols_pro'];
        $resultado_time_casa->gols_contra = $_POST['gols_contra'];
        $resultado_time_casa->id_time = $_POST['id_time_casa'];

        $resultado_time_visitante = new Resultado();
        $resultado_time_visitante->id_jogo = $_POST['id_jogo'];
        $resultado_time_visitante->gols_pro = $_POST['gols_contra'];
        $resultado_time_visitante->gols_contra = $_POST['gols_pro'];
        $resultado_time_visitante->id_time = $_POST['id_time_visitante'];
 
        
        $resultado_time_casa->save();
        $resultado_time_visitante->save();

        if($resultado_time_casa->id > 0 && $resultado_time_visitante->id > 0){
            carregarInterface('exibir_jogos');
        }
    }
    salvarResultados();
?>
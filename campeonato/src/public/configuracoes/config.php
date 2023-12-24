<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    
    define("MODELO", dirname(realpath('../modelos/')."/modelos"));
    define("CONFIGURACOES",  dirname(realpath('../configuracoes')."/configuracoes"));
    define("INTERFACES",  dirname(realpath('../interfaces')."/configuracoes"));
    define("CONTROLES",  dirname(realpath('../interfaces')."/configuracoes"));
    
    include(MODELO."/Banco.php");
    include(MODELO."/Modelo.php");
    include(MODELO."/Jogador.php");
    include(MODELO."/Time.php");
    include(MODELO."/Contrato.php");
    include(MODELO."/Campeonato.php");
    include(MODELO."/Edicao.php");
    include(MODELO."/Jogo.php");
    include(MODELO."/Resultado.php");

   function carregarInterface($interface, $dados = []){
        $caminhoArquivo = INTERFACES . "/" . $interface. ".php";
        
        if(count($dados) > 0){
            foreach ($dados as $chave => $valor) {
                if(strlen($chave)){
                    ${$chave} = $valor;
                }
            };
        }
        require_once($caminhoArquivo);
    }
?>
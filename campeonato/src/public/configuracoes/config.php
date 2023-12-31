<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    
    define("MODELO", dirname(realpath('../modelos/')."/modelos"));
    define("CONFIGURACOES",  dirname(realpath('../configuracoes')."/configuracoes"));
    define("INTERFACES",  dirname(realpath('../interfaces')."/configuracoes"));
    define("CONTROLES",  dirname(realpath('../controles')."/configuracoes"));
    define("EXCECOES",  dirname(realpath('../Exceptions')."/configuracoes"));
    
    include(EXCECOES."/AppException.php");
    include(EXCECOES."/ValidationException.php");
    include(MODELO."/Banco.php");
    include(MODELO."/Modelo.php");
    include(MODELO."/Jogador.php");
    include(MODELO."/Time.php");
    include(MODELO."/Contrato.php");
    include(MODELO."/Campeonato.php");
    include(MODELO."/Edicao.php");
    include(MODELO."/Resultado.php");
    include(MODELO."/CampeonatoEdicao.php");
    include(MODELO."/Jogo.php");
    include(MODELO."/Partida.php");
    include(MODELO."/Paginacao.php");

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
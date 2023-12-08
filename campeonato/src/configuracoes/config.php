<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    
    define("MODELOPATH", dirname(realpath('../modelos/')."\modelos"));
    define("CONFIGPATH",  dirname(realpath('../configuracoes')."\configuracoes"));
    
    include(MODELOPATH."\Banco.php");
    include(MODELOPATH."\Modelo.php");
    include(MODELOPATH."\Jogador.php");
    
    

    echo "Ok";
?>
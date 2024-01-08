<?php
    require_once(dirname(__FILE__) . '/configuracoes/config.php');
    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    
    if($uri === '/' || $uri === '' || $uri === '/index.php'){
        if(isset($_POST['route'])){
            $uri = '/'.$_POST['route'];
        }else{
            $uri = '/exibir_jogadores.php';
        }
    }
    
    if(file_exists(CONTROLES."/".$uri)){
        
        require(CONTROLES."/".$uri);  
    }else{
        die();
    }
    
      
?> 
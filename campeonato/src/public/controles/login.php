<?php
$exception = NULL;



if ($_POST) {
    echo('passamosaqui');
    echo"entrou aqui";
    $usuario = new Login($_POST);
    try {
        $usuario = $usuario->verificarLogin();
        header('Location: exibir_jogadores.php');
        exit();
    } catch (AppException $e) {
        $exception = $e;
    }
    
}
var_dump($_POST);
carregarInterface('login', $_POST+['errors' => $exception]);

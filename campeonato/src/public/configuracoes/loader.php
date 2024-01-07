<?php 

function carregarModelos($modelo){
    require(MODELO."/".$modelo.".php");
}
function carregarTemplateInterface($interface, $dados = [])
{
    if (count($dados) > 0) {
        foreach ($dados as $chave => $valor) {
            if (strlen($chave)) {
                ${$chave} = $valor;
            }
        };
    }
    require_once(COMPONENTES . "/cabecalho.php");
    require_once(INTERFACES . "/" . $interface . ".php");
    require_once(COMPONENTES ."/rodape.php");
}

function carregarInterface($interface, $dados = [])
{
    if (count($dados) > 0) {
        foreach ($dados as $chave => $valor) {
            if (strlen($chave)) {
                ${$chave} = $valor;
            }
        };
    }
    require_once(INTERFACES . "/" . $interface . ".php");
}

?>
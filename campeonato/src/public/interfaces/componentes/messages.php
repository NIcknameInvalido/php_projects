<?php
function exibirMensagem($mensagem, $estilo = 'alert-primary')
{
    if (!empty($mensagem)) {
        echo '<div class="alert ' . $estilo . '" role="alert">';
        echo $mensagem;
        echo '</div>';
    }
}
?>
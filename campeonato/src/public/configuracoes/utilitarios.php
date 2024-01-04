<?php

function getFormatedDate($date = ""){
    if (strlen($date) > 0) {
        return new DateTime($date);
    } else {
        return new DateTime();
    }
}

function calcularIdade($dt_nascimento){
    $diferenca = getFormatedDate()->diff(getFormatedDate($dt_nascimento));

    return $diferenca->y;
}

?>

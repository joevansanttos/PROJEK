<?php

function buscaCidade($conexao , $cidade){
    $query = "select  * from cidade where CT_IBGE = '{$cidade}'";
    $resultado = mysqli_query($conexao, $query);
    $usuario = mysqli_fetch_assoc($resultado);
    return $usuario;

}
<?php
    session_start();
    require('classes/Usuario.php');
    $usuario = new Usuario();
    $usuario->sairConta();

    
?>
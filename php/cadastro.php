<?php 
    session_start();
    if(!isset($_SESSION['logado'])){
        include('../layouts/header.html');
        include('../layouts/formCadastro.html');
    }
    else{
        Header('Location: perfil.php');
    };

?>
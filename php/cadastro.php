<?php 
    session_start();
    if($_SESSION['logado'] != 1){
        include('../layouts/header.html');
        include('../layouts/formCadastro.html');
    }
    else{
        Header('Location: perfil.php');
    };

?>
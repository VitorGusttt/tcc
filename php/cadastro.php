<?php 
    session_start();
    if(!isset($_SESSION['logado'])){
        include('../layouts/header.html');
        include('../layouts/formCadastro.html');
    }
    else{
        Header('Location: perfil.php');
        exit();
    };

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

    <script src="../js/campos.js"></script>
</body>
</html>
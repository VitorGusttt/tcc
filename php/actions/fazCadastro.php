<?php
require('classes/Usuario.php');
require('conn.php');

//crio um objeto pessoa
$usuario = new Usuario();

//atribuo seus valores
$usuario->setNome($_POST['nomeUsuario']);
$usuario->setCpf($_POST['cpfUsuario']);
$usuario->setSenha(md5($_POST['senhaUsuario']));
$usuario->setCategoria($_POST['categoriaUsuario']);

//jogo no BD
$usuario->cadastroBD($conn);
?>
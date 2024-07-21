<?php
session_start();

require('classes/Usuario.php');
require('conn.php');

//crio um objeto pessoa
$usuario = new Usuario();

//atribuo seus valores
$usuario->setCpf($_POST['cpfUsuarioLogin']);
$usuario->setSenha(md5($_POST['senhaUsuario']));

//pego valores
$cpfUser = $usuario->getCpf();
$senhaUser = $usuario->getSenha();

//jogo no BD
$usuario->login($conn, $cpfUser, $senhaUser);
?>
<?php
session_start();
require('classes/Livro.php');
require('conn.php');

//crio um objeto pessoa
$livro = new Livro();

//atribuo seus valores
$livro->setNome($_POST['nomeLivro']);
$livro->setAutor($_POST['autorLivro']);
$livro->setEditora($_POST['editoraLivro']);
$livro->setIsbn($_POST['isbnLivro']);

//jogo no BD
$livro->cadastroBD($conn);
?>
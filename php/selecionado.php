<?php
require('actions/classes/Livro.php');
require('actions/conn.php');

//crio um objeto livro
$livro = new Livro();

//jogo no BD
$livro->serSelecionado($conn);
?>
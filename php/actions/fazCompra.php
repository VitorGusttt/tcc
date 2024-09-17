<?php
    require('classes/Livro.php');
    require('conn.php');

    $livro = new Livro();

    $livro->serComprado($conn);

?>
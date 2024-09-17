<?php 
    session_start();
    //inclui os necessarios
    include('../layouts/header.html');
    require('actions/conn.php');

    //faz a query
    $sql = "SELECT * FROM livro";
    $resultado = $conn->query($sql);
//abro html para colocar na main

?>
<html>
    <main>
</html>

<?php
    if(isset($_SESSION['logado'])){
        //se tiver mais de 0 resultados
        if ($resultado->num_rows > 0) {
            //mostra qtd de livros
            echo "$resultado->num_rows livro(s) encontrados !";

            
            while($row = $resultado->fetch_assoc()) {
            echo "
            <div class='container-Livro'>
                <div class= 'imagem-livro'>
                    <img src='' alt='capa do livro $row[nome]' title='capa do livro $row[nome]' class='capaLivro'>
                </div>

                <div class ='caixa-texto-livro'>
                    <h4 class= 'nomeLivro'>$row[nome]</h4>
                    <p>$row[autor]</p>

                </div>
            </div>
            ";
            }
        }
        else 
        {
        echo 'Nenhum livro cadastrado!';
        };
        //fecho html
    }
    else {
        echo '<h3>Efetue o login para ver os livros pedidos</h3>';
    }
?>

<html>
    </main>
    <script src="../js/script.js"></script>
</html>

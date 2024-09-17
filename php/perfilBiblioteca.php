<?php 
    session_start();
    //inclui os necessarios
    include('../layouts/header.html');
    require('actions/conn.php');

    //faz a query
    $cpf = $_SESSION['cpf'];
    $sql = "SELECT * FROM livro where statusLivro = 1";
    $resultado = $conn->query($sql);
//abro html para colocar na main

?>
<html>
    <main>
        <?php
        echo"
            <div class='infoPerfil'>
                <p>cpf:</p>
                <h2>$cpf</h2>
                <a href = 'actions/sairConta.php'>Sair da conta</a>
            </div>
    
    
            <h4 class='pedidosPerfil'>Livros solicitados</h4>"
        ?>
</html>

<?php
    //se tiver mais de 0 resultados
    if ($resultado->num_rows > 0) {
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
            </div>";

        }
        echo "<a id = 'linkCompra' href = 'actions/fazCompra.php'><button type= 'submit' class = 'btn-compra'>COMPRAR</button></a>";
    }
    else 
    {
       echo 'Nenhum livro solicitado!';
       echo 'Para solicitar basta clicar no livro';
    };
    //fecho html
?>

<html>
    </main>
    <script src="../js/script.js"></script>
</html>

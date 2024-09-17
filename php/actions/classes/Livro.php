<?php
    class Livro{
        //atributos do livro
        private $nome;
        private $autor;
        private $editora;
        private $isbn;
        private $statusLivro;

        //gets
        public function getNome(){
            return $this->nome;
        }
        public function getAutor(){
            return $this->autor;
        }
        public function getEditora(){
            return $this->editora;
        }
        public function getIsbn(){
            return $this->isbn;
        }
        public function getStatusLivro(){
            return $this->statusLivro;
        }

        //sets
        public function setNome($valor){
            $this->nome = $valor;
        }
        public function setAutor($valor){
            $this->autor = $valor;
        }
        public function setEditora($valor){
            $this->editora = $valor;
        }
        public function setIsbn($valor){
            $this->isbn = $valor;
        }
        public function setStatusLivro($valor){
            $this->statusLivro = $valor;
        }

        //metodos adicionais
        public function cadastroBD($conn){
            if(!isset($_SESSION['logado'])){
                echo '<h1 style = "color: white; background-color: #2E332D; text-align: center">Efetue o Login</h1>';
                echo '<a href = "../login.php" style = "color: white; background-color: #2E332D; text-align: center;">Login</a>';
            }
            else{
                $cpf = $_SESSION['cpf'];
                $sql = "INSERT INTO livro VALUES (DEFAULT, '$this->nome', '$this->autor', '$this->editora', '$cpf', '$this->isbn', 0)";
                if ($conn->query($sql)){
                    header('Location: ../perfil.php');
                }
                else{
                    echo '<h1 style = "color: white; background-color: #2E332D; text-align: center">Ocorreu um erro</h1>';
                        echo '<a href = "../cadastroLivros.php" style = "color: white; background-color: #2E332D; text-align: center;">Tente novamente</a>';
                };
            };
            
        }

        public function serSelecionado($conn){
            $id = $_GET['id'];
            
            $query = "UPDATE livro SET statusLivro = 1 where id = $id";
            if ($conn->query($query)){
                header('Location: home.php');
            ?>
                <script>
                    alert('Livro solicitado');
                </script>
                <?php
            }
        }
        
        public function serComprado($conn){
            $sql = "SELECT * FROM livro WHERE statusLivro = 1";
            $resultado = $conn->query($sql);
            $numeroR = $resultado->num_rows;

            if($numeroR > 0){
                while($row = $resultado->fetch_assoc()) {

                    //se tiver resposta
                    //separar os dados
                    $id = $row['id'];
                    $nome = $row['nome'];
                    $autor = $row['autor'];
                    $editora = $row['editora']; 
                    $isbn = $row['isbn'];
                    $cpf = $row['cpfPedido'];

                    //lancar os dados na tabela nova
                    $query = "INSERT INTO compras VALUES ($id, $nome, $autor, $editora, $isbn, $cpfPedido, DEFAULT)";
                    $conn->query($query);

                    $query2 = "DELETE FROM livro WHERE id = $id";
                    $conn->query($query);

                }

                header('Location: compras.php');
            }
        }

        public function imprimir(){
            echo 'nome: ' . $this->nome . '<br>';
            echo 'autor: ' . $this->autor . '<br>';
            echo 'editora: ' . $this->editora . '<br>';
            echo 'Isbn: ' . $this->isbn . '<br>';
        }
    }
?>
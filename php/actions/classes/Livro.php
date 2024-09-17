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

        public function imprimir(){
            echo 'nome: ' . $this->nome . '<br>';
            echo 'autor: ' . $this->autor . '<br>';
            echo 'editora: ' . $this->editora . '<br>';
            echo 'Isbn: ' . $this->isbn . '<br>';
        }
    }
?>
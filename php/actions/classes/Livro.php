<?php
    class Livro{
        //atributos do livro
        private $nome;
        private $autor;
        private $editora;
        private $categoria;

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
        public function getCategoria(){
            return $this->categoria;
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
        public function setCategoria($valor){
            $this->categoria = $valor;
        }

        //metodos adicionais
        public function cadastroBD($conn){
            if($_SESSION['logado'] != 1){
                echo "<div class = 'mensagemPHP'><h3>Por favor, efetue o login</h3></div>";
            }
            else{
                $cpf = $_SESSION['cpf'];
                $sql = "INSERT INTO livro VALUES (DEFAULT, '$this->nome', '$this->autor', '$this->editora', '$this->categoria', '$cpf')";
                if ($conn->query($sql)){
                    echo "<div class = 'mensagemPHP'><h3>Cadastrado</h3></div>";
                }
                else{
                    echo "<div class = 'mensagemPHP'><h3>Ocorreu algum erro<br> Tente novamente</h3></div>";
                };
            };
            
        }

        public function imprimir(){
            echo 'nome: ' . $this->nome . '<br>';
            echo 'autor: ' . $this->autor . '<br>';
            echo 'editora: ' . $this->editora . '<br>';
            echo 'categoria: ' . $this->categoria . '<br>';
        }
    }
?>
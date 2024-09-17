<?php

    class Usuario {
        //propriedades
        private $nome;
        private $cpf;
        private $senha;
        private $categoria;

        //gets
        public function getNome(){
            return $this->nome;
        }
        public function getCpf(){
            return $this->cpf;
        }
        public function getSenha(){
            return $this->senha;
        }
        public function getCategoria(){
            return $this->categoria;
        }

        //sets
        public function setNome($valor){
            $this->nome = $valor;
        }
        public function setCpf($valor){
            $this->cpf = $valor;
        }
        public function setSenha($valor){
            $this->senha = $valor;
        }
        public function setCategoria($valor){
            $this->categoria = $valor;
        }

        //faz cadastro
        public function cadastroBD($conn){
            $sql = "INSERT INTO usuario VALUES ('$this->nome', '$this->cpf', '$this->senha', '$this->categoria')";
            if ($conn->query($sql)){
                header('Location: ../login.php');
            }
            else{
                echo '<h1 style = "color: white; background-color: #2E332D; text-align: center">Erro</h1>';
                echo '<a href = "../cadastro.php" style = "color: white; background-color: #2E332D; text-align: center;">Tente novamente</a>';
            };
        }

        public function login($conn, $cpf, $senha){
            $sql = "SELECT senha, nome , categoria FROM usuario WHERE cpf = '$cpf'";
            $resultado = $conn->query($sql);
            $numeroR = $resultado->num_rows;

            if($numeroR > 0){
                while($row = $resultado->fetch_assoc()) {

                    //se tiver resposta
                    if($numeroR == 1){
                        if($row['senha'] == $senha){
                            //iniciar sessao
                            $_SESSION['logado'] = 1;
                            $_SESSION['cpf'] = $cpf;
                            $_SESSION['categoria'] = $row['categoria'];
                            if ($_SESSION['categoria'] == 'biblioteca'){
                                header('Location: ../perfilBiblioteca.php');  
                            }
                            else{
                                header('Location: ../perfil.php');   
                            };
                        }
                        else{
                           echo '<h1 style = "color: white; background-color: #2E332D; text-align: center">Senha incorreta</h1>';
                           echo '<a href = "../login.php" style = "color: white; background-color: #2E332D; text-align: center;">Tente novamente</a>';
                        };
                        
                    }
                };
            }
            else{
                echo 'cpf n logado';
            };   
        }
        
        public function sairConta(){
            session_destroy();
            header('Location: ../home.php');
        }

        public function imprimir(){
            echo 'nome: ' . $this->nome . '<br>';
            echo 'senha: ' . $this->senha . '<br>';
            echo 'cpf: ' . $this->cpf . '<br>';
            echo 'categoria: ' . $this->categoria . '<br>';
        }
    };
?>
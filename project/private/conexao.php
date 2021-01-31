<?php

    class Conexao{
        private $dsn = 'mysql:host=mysql;dbname=lista_de_tarefas';
        private $usuario = 'root';
        private $senha = 'password';
        private $conexao = null;

        public function conectar(){
            try {
                //design pattern singleton
                if($this->conexao === null){
                    $this->conexao = new PDO($this->dsn, $this->usuario, $this->senha);
                }
                return $this->conexao;
                    
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
    }

?>
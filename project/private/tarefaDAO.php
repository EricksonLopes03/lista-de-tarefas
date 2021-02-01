<?php

    class TarefaDAO{
        private $conexao;
        private $tarefa;

        public function __construct(Conexao $conexao, Tarefa $tarefa)
        {
            $this->conexao = $conexao->conectar();
            $this->tarefa = $tarefa;
        }

        public function inserir(){
            try{

                $query = 'insert into tb_tarefas(tarefa, data_prevista_conclusao) 
                values (:tarefa , :data_prevista_conclusao )';
                $stmt = $this->conexao->prepare($query);
                $stmt->bindValue(':tarefa', $this->tarefa->__get('tarefa'));
                $stmt->bindValue(':data_prevista_conclusao', $this->tarefa->__get('dataPrevistaConclusao'));
                $stmt->execute();
            }catch(PDOException $e){
                print($e->getMessage());
            }
            
        }
        public function buscar(){

        }
        public function alterar(){

        }
        public function apagar(){

        }
        
        
    }

?>